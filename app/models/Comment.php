<?php  namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = array('user_id', 'content', 'project_id');

    public function project()
    {
    	return $this->belongsTo('Project');
    }

}
