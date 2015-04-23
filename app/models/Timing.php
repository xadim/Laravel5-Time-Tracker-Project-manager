<?php  namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model {

    protected $fillable = array( 'status', 'type_id', 'tracker', 'project_id', 'phase_id' );

    public function project()
    {
    	return $this->belongsTo('Phase');
    }

}
