<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\models\Project;
use App\models\Task;
use App\User;

class PagesController extends Controller {

	
	public function __construct(Project $project){

		/**
		*
		*Middleware accessibility for only authenticated users
		**/
		$this->middleware('auth');
		$this->project=$project;
		
	}


	public function index()
	{
		//$categories = Project::get();
		//dd($categories); //similar to die
		$projects = $this->project->orderBy('id', 'desc')->paginate(10);
		

		return view('projects.projects', ['projects' => $projects, 'word' => '']);
	}

	public function create()
	{
		return view('projects.create', ['taskdesigns' => '']);
	}

	
	public function store(CreateProjectRequest $request, Project $project)
	{

		//$obj = $project->create($request->all());
		
		$project->user_id = $request->user_id;
		$project->client_id = $request->clt_id;
		$project->title = $request->title;
		$project->slug = $request->slug;
		$project->unit = $request->unit;
		$project->tags = $request->tags;
		$project->desc = $request->desc;
		$project->authorized_users = $request->authorized_users;
		$project->status = $request->status;

//		dd($project->all());

		$project->save();

		return redirect()->route('projects.index');
	}

	

	public function show(Project $project)
	{
		//dd(calcualteDesignTimeSpending($project->id));
		$task = new Task;
		$tasks = $task->whereProject_id($project->id)->orderBy('id', 'desc')->first();

		return view('projects.show', compact('project'), ['taskdesigns' => '1' , 'task' => $tasks]);
	
	}

	

	
	public function edit(Project $project)
	{

		$task = new Task;
		$tasks = $task->whereProject_id($project->id)->orderBy('id', 'desc')->first();

		return view('projects.edit', compact('project'), ['taskdesigns' => '1' , 'task' => $tasks]);
	
	}

	

	
	public function update(Project $project, Request $request)
	{
		

		//dd($request['clt-id']);
		$toSave = 0;

		//$project->fill($request->input())->save();
		$updateProject = $this->project
            ->where('id', $project->id)
            ->update(array('client_id' => $request['clt-id'], 'title' => $request['title'], 'desc' => $request['desc'], 
            	'slug' => $request['slug'], 'unit' => $request['unit'], 'tags' => $request['tags'], 'status' => $request['status'], 
            	'authorized_users' => $request['authorized_users'], 'user_id' => $request['project_owner']));

  		return redirect()->route('projects.show', ['slug' => $request['slug']]);

	}

	


	public function destroy(Project $project)
	{
		$project->delete();
		return redirect('projects');
	}



	public function search($word)
	{
		if(filter_var($word, FILTER_VALIDATE_EMAIL)) {
 		
 			$idUser = retrieveOneUser($word)->id;

		}elseif (is_numeric($word)){
			$idUser = $word;
			$client_id = $word;
		}else{
			$idUser = '';
			$client_id = '';
		}

		$projects = $this->project
	                    ->where('tags', 'like',  '%' . $word . '%')
	                    ->orWhere('authorized_users', 'like',  '%' . $word . '%' )
	                    ->orWhere('user_id', 'like', $idUser)
	                    ->orWhere('client_id', 'like', $client_id)
	                    ->paginate(10);
	                    //dd($projects);
		return view('projects.projects', ['projects' => $projects, 'word' => $word]);
	}

	public function searchClientsProjects($word)
	{
		
		$projects = $this->project
	                    ->Where('client_id', 'like', $word)
	                    ->paginate(10);
	                    //dd($projects);
		return view('projects.projects', ['projects' => $projects, 'word' => $word]);
	}


	public function updateSingleTask(Project $project, $id)
	{
			
		$data = array();

		$data = splitString($id); 
		$id = $data[0];
		$statusName = $data[2];
		$currentStatus = $data[3];

		

		$task = new Task;

		$affectedRows = $task->whereId($id)->orderBy('id', 'desc')->first();

		//dd($affectedRows->task_dev);

		$datetime = currentTimestamp($currentStatus);


		if ($currentStatus == "start" or $currentStatus == "restart") {
			$newStatus = "pause";
		}elseif ($currentStatus == "notStart" or $currentStatus == "end") {
			$newStatus = "start";
		}elseif ($currentStatus == "pause") {
			$newStatus = "restart";
		}


		if ($statusName == "status_des") {

			$task->task_designs = $datetime;
			$task->status_task_designs = $newStatus;
			$task->task_prod = $affectedRows->task_prod;
			$task->status_task_prod = $affectedRows->status_task_prod;
			$task->task_dev = $affectedRows->task_dev;
			$task->status_task_dev = $affectedRows->status_task_dev;
			$task->project_id = $affectedRows->project_id;
			$task->save();
		
		}
		
		if ($statusName == "status_dev") {
			
			$task->task_designs = $affectedRows->task_designs;
			$task->status_task_designs = $affectedRows->status_task_designs;
			$task->task_prod = $affectedRows->task_prod;
			$task->status_task_prod = $affectedRows->status_task_prod;
			$task->task_dev = $datetime;
			$task->status_task_dev = $newStatus;
			$task->project_id = $affectedRows->project_id;
			$task->save();
		
			
		}

		if ($statusName == "status_prod") {
			
			$task->task_designs = $affectedRows->task_designs;
			$task->status_task_designs = $affectedRows->status_task_designs;
			$task->task_prod = $datetime;
			$task->status_task_prod = $newStatus;
			$task->task_dev = $affectedRows->task_dev;
			$task->status_task_dev = $affectedRows->status_task_dev;
			$task->project_id = $affectedRows->project_id;
			$task->save();
			
		}

		

		return view('projects.show', compact('project'));

	}

	public function updateProjectStatus($array)
	{

		$data = explode(",", $array); 

		$id = $data[0];
		$status = $data[1];

		$updateProject = $this->project
            ->where('id', $id)
            ->update(array('status' => $status));
		
	}

	public function sortby($status)
	{
		
		$projects = $this->project
	                    ->Where('status', 'like', $status)
	                    ->paginate(10);
	                    //dd($projects);
		return view('projects.projects', ['projects' => $projects, 'word' => $status]);
	}	
	
}


