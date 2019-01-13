<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class PostPolicy
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

	public function create(User $user)
	{
		return $user->roles->where('id', 2)->first() !== null;
	}

	public function update(User $user)
	{
		return $user->roles->where('id', 2)->first() !== null;
	}

	public function destroy(User $user)
	{
		return $user->roles->where('id', 2)->first() !== null;
	}
}
