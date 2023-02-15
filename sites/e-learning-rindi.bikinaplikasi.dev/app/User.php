<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = now();
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = now();
    }

    public function kelas()
    {

        return $this->belongsTo(Kelas::class);
    }

    public function mapel_details()
    {

        return $this->hasMany(MapelDetail::class);
    }
    
    public function test_details()
    {

        return $this->hasMany(TestDetail::class);
    }

    public function tugas_details()
    {

        return $this->hasMany(TugasDetail::class);
    }

}
