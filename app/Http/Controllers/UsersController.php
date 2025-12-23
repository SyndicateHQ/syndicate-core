<?php

namespace App\Http\Controllers;

use App\Services\UsersService;

use Inertia\Inertia;
use Inertia\Response;

class UsersController extends Controller
{
	public function __construct(
		protected UsersService $usersService
	) {}

	public function index(): Response
	{
		return Inertia::render('Index', [
			'users' => $this->usersService->getUsers()
		]);
	}
}
