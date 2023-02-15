<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $guarded = [];
    protected $table   = 'alternatifs';
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getKriteriaDetailIds()
    {
        $kriteria_detail_ids = AlternatifDetail::where('alternatif_id', $this->id)->pluck('kriteria_detail_id')->toArray();

        return $kriteria_detail_ids;
    }

    public function alternatif_details()
    {
        return $this->hasMany(AlternatifDetail::class);
    }

    public function getAlternatifDetailIds()
    {
        $alternatif_detail_ids = AlternatifDetail::where('alternatif_id', $this->id)->pluck('id')->toArray();

        return $alternatif_detail_ids;
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
