<?php

namespace App\Helpers\Contracts;

use Illuminate\Http\Request;
use App\Models\User;

Interface SaveStr {

	public static function save( Request $request, User $user );


	public static function checkData( $array );

}