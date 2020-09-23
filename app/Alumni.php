<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = ['nama','job', 'alamat', 'foto', 'tahun','testimoni'];
}
