<?php

namespace Myrtle\Core\MaritalStatuses\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Myrtle\MaritalStatuses\Models\MaritalStatus;

class MaritalStatusPolicy
{

	use HandlesAuthorization;

	public function __construct()
	{
		//
	}

	public function admin(User $user)
	{
		return $user->allPermissions->contains(function ($ability, $key)
		{
			return $ability->name === 'maritalstatuses.admin';
		});
	}

	/**
	 * Determine whether the user can view the maritalStatus.
	 *
	 * @param  App\User          $user
	 * @param  App\MaritalStatus $maritalStatus
	 *
	 * @return mixed
	 */
	public function view(User $user, MaritalStatus $maritalStatus)
	{
		return $user->allPermissions->contains(function ($ability, $key) use ($maritalStatus)
		{
			return $ability->name === 'maritalstatuses.manage' || $ability->name === 'maritalstatuses.view.' . $maritalStatus->id;
		});
	}

	/**
	 * Determine whether the user can create maritalStatuses.
	 *
	 * @param  App\User $user
	 *
	 * @return mixed
	 */
	public function create(User $user)
	{
		return $user->allPermissions->contains(function ($ability, $key)
		{
			return $ability->name === 'maritalstatuses.manage' || $ability->name === 'maritalstatuses.create';
		});
	}

	/**
	 * Determine whether the user can update the maritalStatus.
	 *
	 * @param  App\User          $user
	 * @param  App\MaritalStatus $maritalStatus
	 *
	 * @return mixed
	 */
	public function update(User $user, MaritalStatus $maritalStatus)
	{
		return $user->allPermissions->contains(function ($ability, $key) use ($maritalStatus)
		{
			return $ability->name === 'maritalstatuses.manage' || $ability->name === 'maritalstatuses.edit.' . $maritalStatus->id;
		});
	}

	/**
	 * Determine whether the user can delete the maritalStatus.
	 *
	 * @param  App\User          $user
	 * @param  App\MaritalStatus $maritalStatus
	 *
	 * @return mixed
	 */
	public function delete(User $user, MaritalStatus $maritalStatus)
	{
		//
	}
}
