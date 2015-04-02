<?php  namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $fillable = array('task_designs', 'task_prod', 'task_dev', 'project_id', 'status_task_designs', 'status_task_prod', 'status_task_dev' );

    public function project()
    {
    	return $this->belongsTo('Project');
    }

}
