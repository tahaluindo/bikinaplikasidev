<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama', 'username', 'password', 'avatar'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'nama' => 'required',
        'password' => 'required',
        'username' => 'required|is_unique[admin.username]'
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getValidationRulesUpdate($id)
    {
        $this->validationRules['username'] = "required|is_unique[admin.username,id,$id]";

            return $this->validationRules;
    }
}