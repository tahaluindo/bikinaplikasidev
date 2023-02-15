<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    protected $guarded = [];
    protected $table   = "projects";

    public function project_details()
    {
        return $this->hasMany(ProjectDetail::class);
    }

    public function alternatifs()
    {
        return $this->hasMany(Alternatif::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function getAspeks()
    {
        $project_details_aspek_ids = ProjectDetail::where('project_id', $this->id)->pluck('aspek_id')->toArray();
        $aspek_id_namas                 = Aspek::whereIn('id', $project_details_aspek_ids)->pluck('nama', 'id')->toArray();

        foreach($aspek_id_namas as $id => $aspek_id_nama) {
            $aspek_url_index = url("aspek?aspek_id=$id");

            $aspek_id_namas[$id] = "<a href='$aspek_url_index'>$aspek_id_nama</a>";
        }

        return implode(', ', $aspek_id_namas);
    }

    public function getAspekUsers()
    {
        $project_details_aspek_ids = ProjectDetail::where('project_id', $this->id)->pluck('aspek_id')->toArray();
        $aspek_id_namas                 = Aspek::whereIn('id', $project_details_aspek_ids)->pluck('nama', 'id')->toArray();

        foreach($aspek_id_namas as $id => $aspek_id_nama) {
            $aspek_url_index = url("aspek?aspek_id=$id");

            $aspek_id_namas[$id] = "$aspek_id_nama";
        }

        return implode(', ', $aspek_id_namas);
    }

    public function getAspekIds()
    {
        $project_details_aspek_ids = ProjectDetail::where('project_id', $this->id)->pluck('aspek_id')->toArray();

        return Aspek::whereIn('id', $project_details_aspek_ids)->pluck('id')->toArray();
    }
}
