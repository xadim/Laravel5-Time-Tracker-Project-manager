<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

Class User extends Model{
	
	/**
	*Fillable fields for a project
	*
	*/
	protected $fillable = ['name', 'email', 'password'];

}

