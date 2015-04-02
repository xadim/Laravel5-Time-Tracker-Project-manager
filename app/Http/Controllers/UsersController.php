<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\models\User;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function __construct(User $user){

		$this->middleware('auth');
		$this->user=$user;
	}


	public function index()
	{
		$users = $this->user->orderBy('id', 'desc')->get();
		
		return view('users.users', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store(CreateUserRequest $request, User $user)
	{
		
		$user = new User;
		$user->name = $request['name'];
		$user->email = $request['email'];
		$user->password = bcrypt($request['password']);
		$user->save();
		return redirect()->route('users.index');
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{

		return view('users.edit', compact('user'));
	
	}


	public function update(User $user, Request $request)
	{
		
		$user->fill($request->input())->save();

		return redirect()->route('users.index');

	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{
		$affectedRows = $user->delete();
		return $affectedRows;
	}

}
