<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use FPDF;
use setasign\Fpdi\Fpdi;


class Dokumen extends BaseController
{
    protected $request;
    protected $model;
    protected $validation;
    protected $data;

    public function __construct()
    {
        $this->model = new \App\Models\Dokumen();
        $this->request = \Config\Services::request();
        $this->data['validation'] = \Config\Services::validation();
    }

    public function index()
    {
        if ($this->request->getGet('q')) {
            $this->data['items'] = $this->model->like($this->request->getGet('berdasarkan'), $this->request->getGet('q'))->paginate(5);
            $this->data['pager'] = $this->model->pager;
            $this->data['items_count'] = $this->model->like($this->request->getGet('berdasarkan'), $this->request->getGet('q'))->countAllResults();
        } else {
            $this->data['items'] = $this->model->paginate(5);
            $this->data['pager'] = $this->model->pager;
            $this->data['items_count'] = $this->model->countAll();
        }

        $db      = \Config\Database::connect();
        $this->data['columns'] = $db->query("DESC dokumen")->getResultObject();

        return view('dokumen/index', $this->data);
    }

    public function create()
    {

        return view("dokumen/create", $this->data);
    }

    public function store()
    {

        if (!$this->validate($this->model->getValidationRules())) {

            return view('dokumen/create', ['validation' => $this->validator]);
        }

        $dataInput = $this->request->getPost();
        $dataInput['user_id'] = user_id();

        try {
            $lampiran_dokumen_asli = $this->request->getFile('lampiran_dokumen_asli')->getRandomName();
            $dataInput['lampiran_dokumen_asli'] = $lampiran_dokumen_asli;
            $this->request->getFile('lampiran_dokumen_asli')->move('uploads/lampiran_dokumen_aslis', $lampiran_dokumen_asli, true);

            $lampiran_tanda_tangan_asli = $this->request->getFile('lampiran_tanda_tangan_asli')->getRandomName();
            $dataInput['lampiran_tanda_tangan_asli'] = $lampiran_tanda_tangan_asli;
            $this->request->getFile('lampiran_tanda_tangan_asli')->move('uploads/lampiran_tanda_tangan_aslis', $lampiran_tanda_tangan_asli, true);

        } catch (\Throwable $t) {

        }

        // sisipkan qrcodenya
        $pdf = new Fpdi();
        $pdf->setSourceFile('uploads/lampiran_dokumen_aslis/' . $lampiran_dokumen_asli);
        $pdf->addPage("P");
        $documen_hash = $lampiran_dokumen_asli;

        $text = $documen_hash;
        $cipherAlphabet = "yhkqgvxfoluapwmtzecjdbsnri";
        $cipherText;

        Encipher($text, $cipherAlphabet, $cipherText);
//        Decipher($cipherText, $cipherAlphabet, $plainText);

        \qrcode::png($cipherText, "qrcode.png", 5, 5);
        $pdf->Image(__DIR__ . "/../../public/qrcode.png", 75, 50);

        for($i = 1; $i < 1000; $i++) {
            try {
                $tplIdx = $pdf->importPage($i);
                $pdf->addPage();
                $pdf->useTemplate($tplIdx, 0, 0);
                $pdf->SetFont('Arial');
                $pdf->SetTextColor(255, 0, 0);
                $pdf->SetXY(0, 0);
            } catch (\InvalidArgumentException $exception) {
                break;
            }
        }

        $pdf->Output("uploads/lampiran_dokumen_qrcodes/$lampiran_dokumen_asli", 'F');
        $dataInput['lampiran_dokumen_qrcode'] = $lampiran_dokumen_asli;
        $dataInput['dokumen_hash'] = $cipherText;

        $db      = \Config\Database::connect();
        if(!$db->table('dokumen')->insert($dataInput)) {

            die("Gagal menyimpan data ke database!");
//            dd($this->model->getCompiledInsert());
        }

        return redirect()->to("/dokumen")->with('success', 'Berhasil menyimpan data');
    }

    public function edit($id)
    {
        $this->data['item'] = (new \App\Models\Admin)->find($id);

        return view('dokumen/edit', $this->data);
    }

    public function update($id)
    {
        $item = (new \App\Models\Admin)->find($id);
        if (!$this->validate($this->model->getValidationRulesUpdate($id))) {

            return $this->edit($id);
        }

        $dataInput = $this->request->getPost();
        $dataInput['password'] = password_hash($dataInput['password'], PASSWORD_DEFAULT);

        try {
            $avatar = $this->request->getFile('avatar')->getRandomName();
            $dataInput['avatar'] = $avatar;
            $this->request->getFile('avatar')->move('uploads/avatars', $avatar, true);

            helper('filesystem');
            delete_files("uploads/avatars/" . $item->avatar);
        } catch (\Throwable $t) {

        }

        $this->model->update($id, $dataInput);

        return redirect()->to("/admin");
    }

    public function delete($id)
    {
        (new \App\Models\Dokumen())->delete(['id' => $id]);

        return redirect()->to("/dokumen");
    }

    public function scan()
    {

        return view("dokumen/scan/qrcode");
    }


    public function scan_get_data()
    {

        $cipherAlphabet = "yhkqgvxfoluapwmtzecjdbsnri";
        $dokumen = $this->model->where("dokumen_hash", $_GET['dokumen_hash'])->first();
        if(!$dokumen) {

            die("Data dokumen tidak ditemukan!");
        }

        $base_url = base_url();
        die(
            "Judul dokumen: $dokumen->judul_dokumen <br>".

            "lampiran_tanda_tangan_asli: <img src=\"$base_url/uploads/lampiran_tanda_tangan_aslis/$dokumen->lampiran_tanda_tangan_asli\" width=\"50\"
                                             height=\"50\"> <br>".

            "lampiran_dokumen_asli: <a href=\"$base_url/uploads/lampiran_dokumen_aslis/$dokumen->lampiran_dokumen_asli\" width=\"50\"
                                           height=\"50\">Download</a> <br>".

            "dokumen_qrcode: <a href=\"$base_url/uploads/lampiran_dokumen_qrcodes/$dokumen->lampiran_dokumen_qrcode\" width=\"50\"
                                           height=\"50\">Download</a> <br>"
        );
    }
}
