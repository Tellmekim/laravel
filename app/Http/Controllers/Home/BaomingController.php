<?php

namespace App\Http\Controllers\Home;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class BaomingController extends BaseController
{
     function  index(){
		return  $this->display("home.indexs.baoming");
	 }
}
