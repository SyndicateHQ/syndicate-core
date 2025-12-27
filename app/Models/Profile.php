<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
	use HasUuids;

	public $incrementing = false;
	protected $keyType = 'string';


	protected $fillable = [
		'name',
		'public_email',
		'phone',
		'summary',
		'location'
	];

	public function user() {
		return $this->belongsTo(User::class);
	}
}
