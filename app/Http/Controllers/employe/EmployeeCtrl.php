<?php
namespace App\Http\Controllers\employe;

use App\Employee;

class EmployeeCtrl extends \App\Http\Controllers\BaseController
{
	public function __construct(){
			
      $this->modelo = new Employee;
  }

  public function employees(){
		return view('employees.principal');
	}

	//llena la tabla
	public function grid(){
		$employees = $this->modelo->get();
		$data=array();

		foreach ($employees as $employe) {
			$data[] = array(
				"id" 		=> $employe->id,
				"name" 		=> $employe->name,
				"address" 	=> $employe->address,
				"salary" 	=> $employe->salary
			);
		}

		return \Response::json(
			array(
				"success"=>"true",
				"data"=>$data
			)
		);

	}

	public function get(){
		$id = \Input::get('txtId');

		$modelo = $this->modelo;
		$registro=null;

		if(isset($id) && $id != "" && $id != "0"){
			$registro = $modelo::find($id);

			$data = array(
				"id" 		=> $registro->id,
				"name" 		=> $registro->name,
				"address" 	=> $registro->address,
				"salary" 	=> $registro->salary
			);
		}		

		return \Response::json(
			array("success"=>true, "data" => $data)
		);
	}

	public function save(){
		$id = \Input::get('txtId');
		$name = \Input::get('txtName');
		$salary = \Input::get('txtSalary');
		$address = \Input::get('txtAddress');

		$modelo = $this->modelo;
		$registro=null;

		if(isset($id) && $id != "" && $id != "0"){
			$registro = $modelo::find($id);
		}

		if(is_null($registro)){
			$registro = new $modelo;
		}

		$registro->name = $name;
		$registro->salary = $salary;
		$registro->address = $address;
		
		$registro->save();
		return \Response::json(array("success"=>"true","msg"=>"Registro guardado correctamente"));
	}


	public function delete(){
		$id = \Input::get('txtId');

		$modelo = $this->modelo;
		$registro=null;

		if(isset($id) && $id != "" && $id != "0"){
			$registro = $modelo::find($id);

			$registro->delete();
			return \Response::json(array("success"=>"true","msg"=>"Registro eliminado correctamente"));
		}
		
	}
}
