<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use FPDF;
use setasign\Fpdi\Fpdi;


class Admin extends BaseController
{
    protected $request;
    protected $model;
    protected $validation;
    protected $data;

    public function __construct()
    {
        $this->model = new \App\Models\Admin();
        $this->request = \Config\Services::request();
        $this->data['validation'] = \Config\Services::validation();
    }

    public function index()
    {
//        $pdf = new Fpdi();
//        $pages_count = $pdf->setSourceFile('uploads/pdfs/example.pdf');
//        $pdf->addPage("P");
//        \qrcode::png("yoyo","qrcode.png", 10, 10);
//        $pdf->Image(__DIR__ . "/../../public/qrcode.png", 65, 50);
//
//        for($i = 2; $i < 10; $i++) {
//            try {
//                $pdf->addPage();
//                $tplIdx = $pdf->importPage($i);
//                $pdf->useTemplate($tplIdx, 0, 0);
//                $pdf->SetFont('Arial');
//                $pdf->SetTextColor(255, 0, 0);
//                $pdf->SetXY(25, 25);
//            } catch (\InvalidArgumentException $exception) {
//                break;
//            }
//        }
//
//        $pdf->Output("uploads/pdfs/example_modified.pdf", 'F');
//        die;

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
        $this->data['columns'] = $db->query("DESC admin")->getResultObject();

        return view('admin/index', $this->data);
    }

    public function create()
    {

        return view("admin/create", $this->data);
    }

    public function store()
    {
        if (!$this->validate($this->model->getValidationRules())) {

            return view('admin/create', ['validation' => $this->validator]);
        }

        $dataInput = $this->request->getPost();
        $dataInput['password'] = password_hash($dataInput['password'], PASSWORD_DEFAULT);

        try {
            $avatar = $this->request->getFile('avatar')->getRandomName();
            $dataInput['avatar'] = $avatar;
            $this->request->getFile('avatar')->move('uploads/avatars', $avatar, true);

        } catch (\Throwable $t) {

        }

        $this->model->save($dataInput);

        return redirect()->to("/admin")->with('success', 'Berhasil menyimpan data admin');
    }

    public function edit($id)
    {
        $this->data['item'] = (new \App\Models\Admin)->find($id);

        return view('admin/edit', $this->data);
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
        (new \App\Models\Admin)->delete(['id' => $id]);

        return redirect()->to("/admin");
    }
}
