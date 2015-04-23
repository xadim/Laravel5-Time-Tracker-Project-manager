<?php  namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model {

    protected $fillable = array('client_id', 'user_id', 'project_id', 'description', 'type_id');

    public function project()
    {
    	return $this->belongsTo('Project');
    }

    public function timing()
    {
    	return $this->hasMany('timing');
    }

}
