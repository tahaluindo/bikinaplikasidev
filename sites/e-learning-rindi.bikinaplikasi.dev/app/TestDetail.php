<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestDetail extends Model
{
    protected $table = 'kuis_details';
    protected $guarded = [];

    public function setvalListTestsAttribute($list_tests) {
        return $this->attributes['list_tests'] = \json_encode($list_tests);
    }

    public function getListTestsAttribute()
    {

        return json_decode($this->attributes['list_tests'], true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
