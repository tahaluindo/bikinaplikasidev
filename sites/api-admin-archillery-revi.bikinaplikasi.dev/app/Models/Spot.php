<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $table = 'spot';
    protected $guarded = [];

    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spot_comments()
    {
        return $this->hasMany(SpotComment::class);
    }
    
    public function spot_user_like()
    {
        return $this->hasOne(SpotLike::class, );
    }
    
    public function spot_likes()
    {
        return $this->hasMany(SpotLike::class);
    }
    
    public function spot_review()
    {
        return $this->hasOne(SpotReview::class);
    }
    
    public function spot_reviews()
    {
        return $this->hasMany(SpotReview::class);
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
