<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
	// protected $fillable = ['name',''];
	protected $primaryKey = 'id';
	public $incrementing = false;
	protected $fillable = ['id','name','pid','periode','title','tags','photo1'];

	public function periode() {
		return $this->belongsTo(Periode::class);
	}
    // protected $table = "periodes";
}
