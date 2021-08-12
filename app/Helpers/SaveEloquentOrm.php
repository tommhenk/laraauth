<?php

namespace App\Helpers;

use App\Helpers\Contracts\SaveStr;
use Illuminate\Http\Request;
use App\Models\User;

class SaveEloquentOrm implements SaveStr {


	public static function save( Request $request, User $user ) {

		$obj = new self;

		$data = $obj->checkData( $request->only('name','site', 'text') );
		$user->contact()->create($data);
	}

	public static function checkData( $array ) {
		return $array;
	}
}