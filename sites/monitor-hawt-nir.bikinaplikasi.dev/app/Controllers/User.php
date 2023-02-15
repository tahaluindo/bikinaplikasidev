<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use FPDF;
use setasign\Fpdi\Fpdi;

class User extends BaseController
{
    protected $request;
    protected $model;
    protected $validation;
    protected $data;

    public function __construct()
    {
        $this->model = new \App\Models\User();
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
        $this->data['columns'] = $db->query("DESC users")->getResultObject();

        return view('user/index', $this->data);
    }

    public function edit($id)
    {
        $this->data['item'] = (new \App\Models\User)->find($id);

        return view('user/edit', $this->data);
    }

    public function update($id)
    {
        if (!$this->validate($this->model->getValidationRulesUpdate($id))) {

            return $this->edit($id);
        }

        $users = model('UserModel');
        $user = new \Myth\Auth\Entities\User($this->request->getPost(['email', 'username', 'password']));
        
        $this->model->update($id, $user->toArray());

        return redirect()->to("/");
    }

    public function active($id)
    {
        $dataInput['confirm'] = 1;
        
        try {
            $user = (new \App\Models\User)->where('id', $id)->first();
            $user->confirm = 1;
            
            $this->model->update($id, $user);
            $db      = \Config\Database::connect();
            $db->query("update users set confirm = '1' where id = '$id'");
        } catch(\Throwable $t) {
            die($t->getMessage());
        }
        

        return redirect()->to("/user")->with("success", "Berhasil mengaktifkan user");
    }
    
    public function delete($id)
    {
        (new \App\Models\User)->delete(['id' => $id]);

        return redirect()->to("/user");
    }
}