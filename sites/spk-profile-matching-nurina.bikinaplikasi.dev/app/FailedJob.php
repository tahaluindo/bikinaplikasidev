<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedJob extends Model
{
    protected $guarded = [];
    protected $table   = "failed_jobs";
}
