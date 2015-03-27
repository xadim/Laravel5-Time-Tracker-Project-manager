<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\models\Project;
use App\models\Task;

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
		$projects = $this->project->get();
		

		return view('projects.projects', ['projects' => $projects, 'word' => '']);
	}

	public function create()
	{
		return view('projects.create', ['taskdesigns' => '']);
	}

	
	public function store(CreateProjectRequest $request, Project $project)
	{

		$obj = $project->create($request->all());

		$id = $obj ->id;
		
		$task = new Task;
		$task->project_id = $id;
		$task->task_designs = nowTimestamp ($_POST['task_designs']);
		$task->task_prod = nowTimestamp ($_POST['task_prod']);
		$task->task_dev = nowTimestamp ($_POST['task_dev']);
		$task->status_task_designs = $_POST['task_designs'];
		$task->status_task_prod = $_POST['task_prod'];
		$task->status_task_dev = $_POST['task_dev'];
		$task->save();

		return redirect()->route('projects.index');
	}

	

	public function show(Project $project)
	{
		//dd(calcualteDesignTimeSpending($project->id));

		return view('projects.show', compact('project'));
	
	}

	

	
	public function edit(Project $project)
	{

		$task = new Task;
		$tasks = $task->whereProject_id($project->id)->orderBy('id', 'desc')->first();

		return view('projects.edit', compact('project'), ['taskdesigns' => '1' , 'task' => $tasks]);
	
	}

	

	
	public function update(Project $project, Request $request)
	{
		
		$toSave = 0;

		$project->fill($request->input())->save();

		$task = new Task;
		$task->project_id = $request['project_id'];

		if ($request['task_designs'] != "task_designs") {
			
			$task->task_designs = nowTimestamp ($request['task_designs']);
			$task->status_task_designs = $request['task_designs'];

			$task->task_prod = $request['task_prod_update'];
			$task->status_task_prod = $request['status_task_prod_up'];
			$task->task_dev = $request['task_dev_update'];
			$task->status_task_dev = $request['status_task_dev_up'];

			$toSave++;
		
		}
		
		if ($request['task_prod'] != "task_prod") {
		
			$task->task_prod = nowTimestamp ($request['task_prod']);
			$task->status_task_prod = $request['task_prod'];

			if ($request['task_designs'] == "task_designs") {
				$task->task_designs = $request['task_designs_update'];
				$task->status_task_designs = $request['status_task_designs_up'];
			}
			$task->task_dev = $request['task_dev_update'];
			$task->status_task_dev = $request['status_task_dev_up'];

			$toSave++;
			
		}

		if ($request['task_dev'] != "task_dev") {
		
			$task->task_dev = nowTimestamp ($request['task_dev']);
			$task->status_task_dev = $request['task_dev'];

			if ($request['task_designs'] == "task_designs") {
				$task->task_designs = $request['task_designs_update'];
				$task->status_task_designs = $request['status_task_designs_up'];
			}
			if ($request['task_prod'] == "task_prod") {
				$task->task_prod = $request['task_prod_update'];
				$task->status_task_prod = $request['status_task_prod_up'];
			}

			$toSave++;

		}

		if ($toSave > 0) {
			$task->save();
		}
		

		return redirect('projects');

	}

	


	public function destroy(Project $project)
	{
		$project->delete();
		return redirect('projects');
	}



	public function search($word)
	{

		$projects = $this->project
	                    ->where('tags', 'like',  '%' . $word . '%')
	                    ->orWhere('authorized_users', 'like', '%' . $word . '%')
	                    ->orWhere('user_id', 'like', $word)
	                    ->get();
	                    //dd($projects);
		return view('projects.projects', ['projects' => $projects, 'word' => $word]);
	}


}
