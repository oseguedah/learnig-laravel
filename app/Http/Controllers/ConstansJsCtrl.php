<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstansJsCtrl extends Controller
{
    public function getConstants(){
        $url=array();
        $messages=array();

        $url = array(
            "employee"      => array(
                                "employee.main"     => route('employee.main'),
                                "employee.grid"     => route('employee.grid'),
                                "employee.save"     => route('employee.save'),
                                "employee.get"      => route('employee.get'),
                                "employee.delete"   => route('employee.delete')
            ),

            "other"         => array()
        );

        return \Response::json(
			array(
				"url"       =>$url,
				"messages"  =>$messages
			)
		);

    }
}
