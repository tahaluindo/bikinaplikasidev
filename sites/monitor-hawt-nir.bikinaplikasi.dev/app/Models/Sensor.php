<?php

namespace App\Models;

use CodeIgniter\Model;

class Sensor extends Model
{
    protected $table      = 'sensor';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['suhu', 'denyut'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'email' => 'required|valid_email',
        'username' => 'required|is_unique[users.username]'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    public function getValidationRulesUpdate($id)
    {
        $this->validationRules['username'] = "required|is_unique[users.username,id,$id]";

            return $this->validationRules;
    }
}