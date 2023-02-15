<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\PembayaranSantriDetail;
use App\Sekolah;
use App\TransaksiLainnya;
use App\TransaksiLainnyaDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class LaporanController extends Controller
{
    private $statuss = [
        'Lunas', 'Belum Lunas', 'Bebas SPP', 'Bebas Makan', 'Santri Baru', 'Santri Keluar', 'Bebas SPP dan Uang Makan'
    ];

    public function index()
    {
        $kelass  = Kelas::orderBy('id', 'DESC')->get();
        $statuss = $this->statuss;

        return view('laporan.index', compact(
            'kelass',
            'statuss'
        ));
    }

    public function pembayaran_santri(Request $request)
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();
        $file          = 'file_excel/laporan_pembayaran_santri_detail.xlsx';
        $inputFileType = \PHPExcel_IOFactory::identify($file);
        $PHPExcel      = \PHPExcel_IOFactory::createReader($inputFileType);
        $PHPExcel      = $PHPExcel->load($file);
        $PHPExcel->setActiveSheetIndex(0);

        $model = new PembayaranSantriDetail();
        $table = $model->getTable();
        $query = $model->query();

        // todo: untuk mengisi data user ke sheet user
        $filters = Arr::where($request->except(['_token', 'print_excel', 'tanggal_akhir']), function ($value) {
            return $value != null;
        });

        // buat filternya
        foreach ($filters as $key => $filter) {
            if ($key == 'tanggal_awal') {
                $query->whereBetween('tanggal_bayar', [$request->tanggal_awal, $request->tanggal_akhir]);
            }

            if ($key == 'kelas_id') {
                $user_ids = User::where('kelas_id', $request->kelas_id)->pluck('id')->toArray();
                $query->whereIn('user_id', $user_ids);
            }

            if ($key == "status") {

                $query->where('status', $request->status);
            }
        }

        $pembayaran_santri_details = $query->orderBy('id', 'DESC')->get();

        // jika user mengklik tombol print_excel, else print_html
        if ($request->print_excel) {
            // $headers = ['NO', 'Tanggal', 'Kelas', 'Nama', 'SPP', 'Uang Makan', 'Belum Bayar', 'Status'];

            // // $PHPExcel->createSheet(0)->setTitle('pembayaran_santri');

            // // todo: mengisi data header ke baris excel
            // $column = "A";
            // foreach ($headers as $header):
            //     $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
            // endforeach;

            // untuk mengatur tanggal
            $styleArray = array(
                'font' => array(
                    'bold'       => true,
                    'color'      => array('rgb' => '000000'),
                    'size'       => 11,
                    'name'       => 'Times New Roman',
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $PHPExcel->getActiveSheet()->getCell('B4')->setValue("Tanggal $request->tanggal_awal Sd $request->tanggal_akhir");
            $PHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($styleArray);

            // isi ke excel
            $column = "B";
            $row    = 8;
            $PHPExcel->setActiveSheetIndex(0);
            foreach ($pembayaran_santri_details as $index => $pembayaran_santri_detail):
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $index + 1);
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->tanggal_bayar);
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->user->kelas->nama);
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->user->nama);
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_spp_dibayar);
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_uang_makan_dibayar);

                if($pembayaran_santri_detail->nominal_belum_dibayar < 0):
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_belum_dibayar);
                else:
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_belum_dibayar);
                endif;


                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->potongan);

                if($pembayaran_santri_detail->nominal_belum_dibayar < 0):
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_spp_dibayar +  $pembayaran_santri_detail->nominal_uang_makan_dibayar);
                else:
                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_spp_dibayar +  $pembayaran_santri_detail->nominal_uang_makan_dibayar - $pembayaran_santri_detail->nominal_belum_dibayar);
                endif;

                $PHPExcel->getActiveSheet()->setCellValue($column++ . $row, $pembayaran_santri_detail->status);

                $row++;
                $column = 'B';
            endforeach;
            // die('sdfdsf');
            // todo: memerintahkan browser untuk melakukan download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment;filename=laporan_pembayaran_santri_detail.xls");

            // todo: lakukan penulisan ke file excel
            $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, $inputFileType);
            $objWriter->save('php://output');
        } else {
            $tanggal_awal  = $request->tanggal_awal;
            $tanggal_akhir = $request->tanggal_akhir;
            $sekolah       = Sekolah::first();

            return view('laporan.pembayaran_santri_detail_html', compact(
                'pembayaran_santri_details',
                'tanggal_awal',
                'tanggal_akhir',
                'sekolah'
            ));
        }
    }

    // public function pembayaran_infaq(Request $request)
    // {dd($request->all());
    //     // todo: gunakan library PHPExcel
    //     $PHPExcel = new \PHPExcel();

    //     $model = new PembayaranSantriDetail();
    //     $table = $model->getTable();
    //     $query = $model->query();

    //     // todo: untuk mengisi data user ke sheet user
    //     $filters = Arr::where($request->except(['_token', 'print_excel', 'tanggal_akhir']), function ($value) {
    //         return $value != null;
    //     });

    //     // buat filternya
    //     foreach ($filters as $key => $filter) {
    //         if ($key == 'tanggal_awal') {
    //             $query->whereBetween('tanggal_bayar', [$request->tanggal_awal, $request->tanggal_akhir]);
    //         }

    //         if ($key == 'kelas_id') {
    //             $user_ids = User::where('kelas_id', $request->kelas_id)->pluck('id')->toArray();
    //             $query->whereIn('user_id', $user_ids);
    //         }

    //         if ($key == "status") {

    //             $query->where('status', $request->status);
    //         }
    //     }

    //     $pembayaran_santri_details = $query->get();

    //     // jika user mengklik tombol print_excel, else print_html
    //     if ($request->print_excel) {
    //         $headers = ['NO', 'Tanggal', 'Kelas', 'Nama', 'SPP', 'Uang Makan', 'Belum Bayar', 'Status'];

    //         $PHPExcel->createSheet(0)->setTitle('pembayaran_santri');

    //         // todo: mengisi data header ke baris excel
    //         $column = "A";
    //         foreach ($headers as $header):
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
    //         endforeach;

    //         // isi ke excel
    //         $column = "A";
    //         $row    = 2;
    //         foreach ($pembayaran_santri_details as $index => $pembayaran_santri_detail):
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $index + 1);
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->tanggal_bayar);
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->user->kelas->nama);
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->user->nama);
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_spp_dibayar);
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_uang_makan_dibayar);
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_belum_dibayar);
    //             $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->status);

    //             $row++;
    //             $column = 'A';
    //         endforeach;

    //         // todo: memerintahkan browser untuk melakukan download
    //         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //         header("Content-Disposition: attachment;filename=laporan_pembayaran_santri_detail.xlsx");

    //         // todo: lakukan penulisan ke file excel
    //         $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    //         $objWriter->save('php://output');
    //     } else {
    //         $tanggal_awal = $request->tanggal_awal;
    //         $tanggal_akhir = $request->tanggal_akhir;

    //         return view('laporan.pembayaran_santri_detail_html', compact(
    //             'pembayaran_santri_details',
    //             'tanggal_awal',
    //             'tanggal_akhir'
    //         ));
    //     }
    // }

    public function transaksi_lainnya(Request $request)
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();
        $file          = 'file_excel/laporan_transaksi_lainnya_detail.xlsx';
        $inputFileType = \PHPExcel_IOFactory::identify($file);
        $PHPExcel      = \PHPExcel_IOFactory::createReader($inputFileType);
        $PHPExcel      = $PHPExcel->load($file);
        $PHPExcel->setActiveSheetIndex(0);

        $model = new TransaksiLainnyaDetail();
        $table = $model->getTable();
        $query = $model->query();

        // todo: untuk mengisi data user ke sheet user
        $filters = Arr::where($request->except(['_token', 'print_excel', 'tanggal_akhir']), function ($value) {
            return $value != null;
        });

        // buat filternya
        foreach ($filters as $key => $filter) {
            if ($key == 'tanggal_awal') {
                $query->whereBetween('tanggal_bayar', [$request->tanggal_awal, $request->tanggal_akhir]);
            }

            if ($key == "status") {

                $query->where('status', $request->status);
            }

            if ($key == "jenis") {
                $transaksi_lainnya_ids = TransaksiLainnya::where('jenis', $request->jenis)->pluck('id')->toArray();

                $query->whereIn('transaksi_lainnya_id', $transaksi_lainnya_ids);
            }
        }

        $transaksi_lainnya_details = $query->orderBy('id', 'DESC')->get();

        // jika user mengklik tombol print_excel, else print_html
        if ($request->print_excel) {
            // $headers = ['NO', 'Tanggal', 'Keterangan', 'Debit', 'Kredit'];

            // $PHPExcel->createSheet(0)->setTitle('transaksi_lainnya');

            // // todo: mengisi data header ke baris excel
            // $column = "A";
            // foreach ($headers as $header):
            //     $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
            // endforeach;

            // untuk mengatur tanggal
            $styleArray = array(
                'font' => array(
                    'bold'       => true,
                    'color'      => array('rgb' => '000000'),
                    'size'       => 11,
                    'name'       => 'Times New Roman',
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ));

            $PHPExcel->getActiveSheet()->getCell('F6')->setValue("Tanggal $request->tanggal_awal Sd $request->tanggal_akhir");
            $PHPExcel->getActiveSheet()->getStyle('F6')->applyFromArray($styleArray);

            // isi ke excel
            $column = "F";
            $row    = 9;
            foreach ($transaksi_lainnya_details as $index => $transaksi_lainnya_detail):
                $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $index + 1);
                $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->tanggal_bayar);
                $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->transaksi_lainnya->nama);

                if ($transaksi_lainnya_detail->transaksi_lainnya->jenis == "Pemasukan") {
                    $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->nominal_dibayar);
                    $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, 0);
                } else {
                    $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, 0);
                    $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->nominal_dibayar);
                }

                $row++;
                $column = 'F';
            endforeach;

            // todo: memerintahkan browser untuk melakukan download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment;filename=laporan_transaksi_lainnya_detail.xls");

            // todo: lakukan penulisan ke file excel
            $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
            $objWriter->save('php://output');
        } else {
            $tanggal_awal  = $request->tanggal_awal;
            $tanggal_akhir = $request->tanggal_akhir;
            $sekolah       = Sekolah::first();

            return view('laporan.transaksi_lainnya_detail_html', compact(
                'transaksi_lainnya_details',
                'tanggal_awal',
                'tanggal_akhir',
                'sekolah'
            ));
        }
    }
}
