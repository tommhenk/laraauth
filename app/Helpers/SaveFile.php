<?php

namespace App\Helpers;

use App\Helpers\Contracts\SaveStr;
use Illuminate\Http\Request;
use App\Models\User;
use Storage;

class SaveFile implements SaveStr {


	public static function save( Request $request, User $user ) {

		$obj = new self;

		$data = $obj->checkData( $request->only('name','site', 'text') );
		$str = $data['name'] . " | " . $data['site'] . " | " . $data['text'];

		Storage::prepend('str.txt', $str);
	}

	public static function checkData( $array ) {
		return $array;
	}
}