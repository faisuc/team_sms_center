<?php

namespace Modules\User\Repositories;

use DB;

class UserRepository
{

	public function getUsers()
	{
		$users = DB::table('users')->where('email' , '<>' , 'admin@admin.com')->get();

		return $users;
	}

	public function getUser($id)
	{
		$user = DB::table('users')->where('id' , $id)->first();

		return $user;
	}

	public function delete($id)
	{
		return DB::table('users')->where('id' , $id)->delete();
	}

	public function getPhonenumber($id)
	{
		$phonenumber = DB::table('users')->where('id' , $id)->first(['phonenumber'])->phonenumber;

		return $phonenumber;
	}

}