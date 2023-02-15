<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokumen extends Model
{
    protected $table      = 'dokumen';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['user_id', 'nama_penanda_tangan', 'judul_dokumen', 'lampiran_dokumen_asli', 'lampiran_tanda_tangan_asli', 'lampiran_dokumen_qrcode', 'dokumen_hash'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'nama_penanda_tangan' => 'required|max_length[30]|min_length[1]',
        'judul_dokumen' => 'required',
        'lampiran_dokumen_asli' => 'uploaded[lampiran_dokumen_asli]|ext_in[lampiran_dokumen_asli,pdf]',
        'lampiran_tanda_tangan_asli' => 'uploaded[lampiran_tanda_tangan_asli]|is_image[lampiran_tanda_tangan_asli]'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getValidationRulesUpdate($id)
    {
        $this->validationRules['lampiran_dokumen_asli'] = "";
        $this->validationRules['lampiran_tanda_tangan_asli'] = "";

            return $this->validationRules;
    }
}