<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Mapel;
use App\MapelDetail;
use App\Test;
use App\TestDetail;
use App\User;
use Illuminate\Http\Request;

class PerekapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['tests']         = Test::where('guru_id', auth()->user()->id)->get();
        
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();
        
        $kelas_ids      = $data['mapel_details']->pluck('kelas_id')->toArray();

        $data['mapel_details'] = $data['mapel_details']->unique('mapel_id');
        // $data['kelass'] = Kelas::whereIn('id', $kelas_ids)->get();

        return view('perekapan.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        // dd($request);
        $mapel_details    = MapelDetail::where('mapel_id', $request->mapel_id)->where('user_id', auth()->user()->id)->get();
        // $mapel_details    = MapelDetail::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->where('user_id', auth()->user()->id)->get();
        $mapel_detail_ids = $mapel_details->pluck('id')->toArray();

        // untuk membersihkan mapel detail
        $mapel_detail_nots    = MapelDetail::whereNotIn('id', $mapel_detail_ids)->get();
        $mapel_detail_id_nots = $mapel_detail_nots->pluck('id')->toArray();
        
        $model = new Test();
        $table = $model->getTable();
        $query = $model->query();

        foreach ($mapel_detail_id_nots as $mapel_detail_id) {

            $query->where('mapel_detail_ids', 'NOT LIKE', "%\"$mapel_detail_id\"%");
        }

        // \DB::enableQueryLog();
        $data['tests_cek'] = $query->get();
        // dd($data['tests']);
        // dd(\DB::getQueryLog());
        // kalo perekapan gak ada kasih tau gak ada perekapan
        if(!$data['tests_cek']->count()) {
            return back()->with('error', 'Tidak ada data');
        }

        $data['mapel_id'] = $request->mapel_id;
        // $data['kelas_id'] = $request->kelas_id;

        // tampilkan data 
        $data['tests']        = Test::where('guru_id', auth()->user()->id)->get();
        $test_ids             = $data['tests']->pluck('id')->toArray();
        $data['test_details'] = TestDetail::whereIn('test_id', $test_ids)->get();
        $test_detail_user_ids = $data['test_details']->pluck('user_id')->toArray();
        $data['users']        = User::whereIn('id', $test_detail_user_ids)->get();

        $data['mapel'] = Mapel::findOrFail($request->mapel_id);
        // $data['kelas'] = Kelas::findOrFail($request->kelas_id);

        return view('perekapan.show', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function print(Request $request) {

        $data['tests']        = Test::where('guru_id', auth()->user()->id)->get();
        $test_ids             = $data['tests']->pluck('id')->toArray();
        $data['test_details'] = TestDetail::whereIn('test_id', $test_ids)->get();
        $test_detail_user_ids = $data['test_details']->pluck('user_id')->toArray();
        $data['users']        = User::whereIn('id', $test_detail_user_ids)->get();

        $data['mapel'] = Mapel::findOrFail($request->mapel_id);
        // $data['kelas'] = Kelas::findOrFail($request->kelas_id);

        if ($request->printHtml) {

            return view('perekapan.print_html', $data);
        }

        // <tr style='background: linear-gradient(to right, #0178bc 0%, #ffc13b 100%); color: white;'>
        //                             <th width=3>No.</th>
        //                             <th>Nama</th>
        //                             @forelse ($tests as $test)
        //                             <th>{{ $test->nama }}</th>
        //                             @empty
        //                             <th>Tidak Ada Kuis</th>
        //                             @endforelse
        //                         </tr>

        //                         @foreach($users as $user)
        //                         <tr>
        //                             <td>{{ $loop->iteration }}.</td>
        //                             <td>{{ $user->nama }}</td>

        //                             @foreach($tests as $test)
        //                             <td>{{ $test->test_details->where('user_id', $user->id)->first()->nilai ?? 0 }}</td>
        //                             @endforeach
        //                         </tr>
        //                     @endforeach

        // pecah variable data
        \extract($data);

        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        $headers = ['No', 'Nama', 'Kelas'];
        foreach ($tests as $test) {
            $headers[] =  $test->nama;
        }

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($headers as $header) {
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
        }

        // todo: untuk mengisi data kelas ke sheet kelas
        $column = "A";
        $row    = 2;
        foreach ($users as $key => $user) {
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $key + 1);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->nama);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->kelas->nama);

            foreach($tests as $test) {
                $nilai = $test->test_details->where('user_id', $user->id)->first()->nilai ?? 0;

                $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $nilai);
            }

            $row++;
            $column = 'A';
        }

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=export_perekapan_$mapel->nama.xlsx");

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}