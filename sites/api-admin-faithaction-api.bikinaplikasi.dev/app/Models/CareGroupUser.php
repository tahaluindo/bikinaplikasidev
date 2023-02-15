<?php

namespace App\Models;

use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CareGroupUser extends Model
{
    use HasFactory;

    protected $table = 'care_group_user';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function care_group()
    {
        return $this->belongsTo(CareGroup::class);
    }

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }
}