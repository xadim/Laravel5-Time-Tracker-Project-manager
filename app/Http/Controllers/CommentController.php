<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;


use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\models\Project;
use App\models\Comment;
use App\models\Task;


class CommentController extends Controller {

	public function __construct(Comment $comment){
		$this->comment=$comment;
	}


	public function update(CreateCommentRequest $request, $id)
	{

		$comment=$this->comment;

		$comment->user_id = $request->get('name');
		$comment->content = $request->get('content');
		$comment->project_id = $id;

		$comment->save();

		$project = Project::whereId($id)->first();

		$slug = $project->slug;

		$task = new Task;
		$tasks = $task->whereProject_id($id)->orderBy('id', 'desc')->first();

		//return view('projects.show', ['project' => $project, 'task' => $tasks]);
		return redirect()->route('projects.show', ['slug' => $slug, 'task' => $tasks]);
	}

}
