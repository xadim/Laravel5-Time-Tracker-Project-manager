<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePhaseRequest;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\models\Phase;

use App\models\Type;

use App\models\Timing;

class PhasesController extends Controller {


	public function __construct(Phase $phase){

		/**
		*
		*Middleware accessibility for only authenticated users
		**/
		$this->middleware('auth');
		$this->phase=$phase;
		$this->type = new Type;
		
	}


	public function index()
	{

		$phases = $this->phase->orderBy('id', 'desc')->paginate(10);

		return view('phases.phases', ['phases' => $phases]);
	
	}

	public function create()
	{


		$type_lists = $this->type->lists('title', 'id');

		return view('phases.create', array('type_lists' => $type_lists));
	
	}

	public function store(CreatePhaseRequest $request, Phase $phase)
	{

		$obj = $phase->create($request->all());

		$id = $obj ->id;
		
		$task = new Timing;
		$task->project_id = $request['project_id'];
		$task->phase_id = $id;
		$task->type_id = $request['type_id'];
		$task->status = 'notStart';
		$task->tracker = '0000-00-00 00:00:00';
		$task->save();

		return redirect()->route('phases.index');
	
	}

	
	public function show(Phase $phase)
	{

		return view('phases.show', compact('phase'));
	
	}

	public function edit(Phase $phase)
	{
		$type_lists = $this->type->lists('title', 'id');

		return view('phases.edit', compact('phase'), array('type_lists' => $type_lists));
	
	}

	public function update(Phase $phase, Request $request)
	{
	
		$phase->fill($request->input())->save();

		return view('phases.show', compact('phase'));
	
	}

	public function destroy(Phase $phase)
	{
	
		$phase->delete();

		return redirect('phases');
	
	}


	public function timing(Phase $phase, $id)
	{
			
		$data = array();

		$data = splitString($id); 
		$id = $data[0];
		$statusName = $data[2];
		$currentStatus = $data[3];
		
		$timing = new Timing;

		$affectedRows = $timing->whereId($id)->orderBy('id', 'desc')->first();

		$datetime = currentTimestamp($currentStatus);


		if ($currentStatus == "start") {
			$newStatus = "pause";
		}elseif ($currentStatus == "notStart") {
			$newStatus = "start";
		}elseif ($currentStatus == "pause") {
			$newStatus = "restart";
		}elseif ($currentStatus == "restart") {
			$newStatus = "pause";
		}


		$timing->tracker = $datetime;
		$timing->status = $newStatus;
		$timing->type_id = $affectedRows->type_id;
		$timing->phase_id = $affectedRows->phase_id;
		$timing->project_id = $affectedRows->project_id;
		$timing->save();


		$updatePhase = $this->phase
            ->where('id', $affectedRows->phase_id)
            ->update(array('updated_at' => currentTimestamp($affectedRows->phase_id)));


		return view('phases.show', compact('phase'));

	}

	public function search($word)
	{

		$phases = $this->phase
	                    ->orWhere('project_id', 'like', $word  )
	                    ->paginate(10);
		return view('phases.phases', ['phases' => $phases, 'word' => $word]);

	}
	
	public function searchcp($word)
	{

		$phases = $this->phase
	                    ->where('client_id', 'like', $word)
	                    ->paginate(10);
		return view('phases.phases', ['phases' => $phases, 'word' => $word]);
		
	}

	public function searchPerType($word)
	{

		$phases = $this->phase
	                    ->where('type_id', 'like', $word)
	                    ->paginate(10);
		return view('phases.phases', ['phases' => $phases, 'word' => $word]);
		
	}


	public function updateTaskTitle($array)
	{

		$data = explode(",", $array); 

		$id = $data[0];
		$title = $data[1];

		$updatePhase = $this->phase
            ->where('id', $id)
            ->update(array('description' => $title));

		return view('phases.phases', ['phases' => $updatePhase]);
		
	}

}
