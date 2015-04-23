<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

Class Client extends Model{
	
	/**
	*Fillable fields for a project
	*
	*/
	protected $fillable = [
		'user_id', 'name', 'address', 'city', 'state', 'country', 'postal', 'email', 'phone1', 'phone2', 'person', 
	];

    public function project()
    {
    	return $this->hasMany('project');
    }

}