<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $guarded = [];
    protected $table   = "project_details";
    public $timestamps = false;
    public $aspeks     = [];

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

}
