<?php  namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $fillable = array('task_designs_start', 'task_designs_pause', 'task_designs_end', 'task_prod_start', 'task_prod_pause', 'task_prod_end', 'task_dev_start', 'task_dev_pause', 'task_dev_end', 'project_id' );

    public function project()
    {
    	return $this->belongsTo('Project');
    }

}
