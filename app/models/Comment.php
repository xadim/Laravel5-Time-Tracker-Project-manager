<?php  namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = array('name', 'content');

    public function project()
    {
    	return $this->belongsTo('Project');
    }

}
