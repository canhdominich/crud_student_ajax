<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = "students";

	protected $fillable = ['hoten', 'ngaysinh', 'gioitinh', 'sdt', 'diachi'];

	public static function getAllStudent(){
		return self::orderBy('id', 'asc')->paginate(1);
	}

	public static function storeData($data){
		
	}
}
