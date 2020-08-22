<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //

	protected $fillable = ['periode'];

	public function organisasi() {
		return $this->hasMany(Organisasi::class);
	} 
	// protected $guarded = ['periode'];
    // protected $table = "periodes";
}
