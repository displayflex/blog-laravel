<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfilePolicy
{
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	public function view(User $user)
	{
		return $user->roles->where('id', 3)->first() !== null;
	}

	public function update(User $user)
	{
		return $user->roles->where('id', 2)->first() !== null;
	}
}
