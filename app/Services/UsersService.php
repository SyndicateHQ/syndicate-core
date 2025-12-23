<?php

namespace App\Services;

use App\Data\UserData;
use App\Models\User;
use Illuminate\Support\Collection;

class UsersService
{
	public function getUsers(): Collection
	{
		return UserData::collect(User::all());
	}
}
