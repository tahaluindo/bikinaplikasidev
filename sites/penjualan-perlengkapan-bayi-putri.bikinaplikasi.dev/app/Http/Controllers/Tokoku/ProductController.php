<?php

namespace App\Http\Controllers\Tokoku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tokoku\StoreProductRequest;
use App\Http\Requests\Tokoku\UpdateProductRequest;
use App\Tokoku\Measure;
use App\Tokoku\Product;
use App\Tokoku\Supplier;
use App\Tokoku\Transaction;
use Excel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class ProductController extends Controller
{
    private $home, $current;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home    = route('home');
        $this->current = route('pdIndex');
    }

    public function index()
    {
        $data['parse'] = Product::orderBy('name')->get();

        $no = 1;
        return view('tokoku.product.index', compact('data', 'no'));
    }

    public function create()
    {
        $data['measure']  = Measure::all();
        $data['supplier'] = Supplier::orderBy('name')->get();
        return view('tokoku.product.create', compact('data'));
    }

    public function store(StoreProductRequest $request)
    {

        $this->validate($request, [
            'gambar' => 'required|image',
        ]);

        $data                 = new Product;
        $data->supplier_id    = $request->input('supplier_id');
        $data->code           = $request->input('code');
        $data->name           = $request->input('name');
        $data->measure_id     = $request->input('measure_id');
        $data->price          = $request->input('price');
        $data->price_grosiran = $request->input('price_grosiran');
        $data->warn_stock     = $request->input('warn_stock');
        $data->berat          = $request->input('berat');
        $data->gambar         = "gambar/" . $request->gambar->getClientOriginalName();
        $request->gambar->move("gambar", $data->gambar);

        $data->save();

        return redirect(route('pdIndex'))->with('status', 'Berhasil Menambah Produk');
    }

    public function edit($id)
    {
        $data['measure']  = Measure::all();
        $data['parse']    = Product::find($id);
        $data['supplier'] = Supplier::orderBy('name')->get();
        if ($data == null) {
            return redirect($this->current);
        }
        return view('tokoku.product.edit', compact('data'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->validate($request, [
            'gambar' => 'image',
        ]);

        $x = Product::find($id);
        if ($x != null) {
            if ($request->gambar) {
                $gambar       = "gambar/" . $request->gambar->getClientOriginalName();
                $array_update = [
                    'supplier_id'    => $request->input('supplier_id'),
                    'name'           => $request->input('name'),
                    'code'           => $request->input('code'),
                    'name'           => $request->input('name'),
                    'measure_id'     => $request->input('measure_id'),
                    'price'          => $request->input('price'),
                    'price_grosiran' => $request->input('price_grosiran'),
                    'warn_stock'     => $request->input('warn_stock'),
                    'berat'          => $request->input('berat'),
                    'gambar'         => $gambar,
                ];

                $request->gambar->move("gambar", $gambar);
            } else {
                $array_update = [
                    'supplier_id'    => $request->input('supplier_id'),
                    'name'           => $request->input('name'),
                    'code'           => $request->input('code'),
                    'name'           => $request->input('name'),
                    'measure_id'     => $request->input('measure_id'),
                    'price'          => $request->input('price'),
                    'price_grosiran' => $request->input('price_grosiran'),
                    'warn_stock'     => $request->input('warn_stock'),
                    'berat'          => $request->input('berat'),
                ];
            }

            $x->update($array_update);
        }

        return redirect($this->current)->with('status', 'Berhasil Mengupdate Produk');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $x = Product::find($id);
        if ($x != null) {
            $x->delete();
        }

        Transaction::where('product_id', $id)->delete();

        return redirect($this->current)->with('status', 'Berhasil Menghapus Produk');
    }

    public function deleteAll()
    {
        DB::table('product')->delete();

        Transaction::truncate();

        return redirect($this->current)->with('status', 'Berhasil Menghapus Semua Produk');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext  = $file->getClientOriginalExtension();

            if ($ext != 'xls') {
                return redirect($this->current)->with('errors', 'Kesalahan: File yang diunggah wajib berekstensi XLS (Excel 1997 - 2003 Format)');
            }

            $data   = Excel::load($file);
            $insert = array();
            foreach ($data->get() as $element) {
                $data = array(
                    'code'       => $element['code'] == null ? '-' : $element['code'],
                    'name'       => $element['name'] == null ? '-' : $element['name'],
                    'warn_stock' => $element['warn_stock'] == null ? 0 : $element['warn_stock'],
                    'price'      => $element['price'] == null ? 0 : $element['price'],
                    'measure_id' => 7,
                );
                $insert[] = $data;
            }
            //dd($insert);
            try {
                Product::insert($insert);
            } catch (Exception $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) {
                    return redirect($this->current)->with('errors', 'Kesalahan: 1062 - Terindikasi ada duplikasi kode barang. Pastikan tidak ada duplikasi Kode Barang sebelum Anda mengunggah berkas .xls Anda');
                }
                return redirect($this->current)->with('errors', 'Kesalahan: 0 - Template xls yang Anda unggah mungkin tidak sesuai ketentuan, Export data terlebih dahulu untuk mengetahui template');
            }
            return redirect($this->current)->with('status', 'Sukses diimpor');
        }
        return redirect($this->current);
    }

    public function export()
    {
        $type = 'xls';
        $name = 'Backup_Products_-_' . Carbon::now()->format('dmyHis');
        $data = Product::get()->toArray();

        return Excel::create($name, function ($excel) use ($data) {
            $excel->sheet('products', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
        echo "<script>window.close();</script>";
    }
}
