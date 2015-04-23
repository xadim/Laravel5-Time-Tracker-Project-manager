<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

Class Project extends Model{
	
	/**
	*Fillable fields for a project
	*
	*/
	protected $fillable = [
		 'client_id', 'title', 'desc', 'slug', 'unit', 'tags', 'status', 'user_id', 'authorized_users'
	];

    public function comment()
    {
    	return $this->hasMany('comment');
    }

    public function task()
    {
    	return $this->hasMany('task');
    }

    public function phase()
    {
    	return $this->hasMany('phase');
    }

}