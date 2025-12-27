<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Organization extends Model
{
	use HasUuids;

	public $incrementing = false;
	protected $keyType = 'string';

	protected $fillable = [
		'id',
		'name',
	];

	private function generateSlug($title)
	{
		$slug = Str::slug($title);
		$originalSlug = $slug;
		$counter = 1;

		while (static::where('slug', $slug)->exists()) {
			$slug = $originalSlug . '-' . $counter;
			$counter++;
		}

		return $slug;
	}

	protected static function boot()
	{
		static::created(function ($org) {
			$org->slug = $this->generateSlug($org->name);
		});

		static::updating(function ($org) {
			if ($org->isDirty('name')) {
				$org->slug = $this->generateSlug($org->name);
			}
		});
	}
}
