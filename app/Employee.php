<?php
namespace App;

class Employee extends BaseModel
{
    public $table = 'employees';
    //Solo si la llave primaria es diferente a id
    protected $primaryKey = 'id';
}
