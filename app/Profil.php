<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = ['nama','alamat','tahun','sejarah','foto'];
}
