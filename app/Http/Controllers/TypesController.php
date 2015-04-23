<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTypeRequest;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\models\Type;

class TypesController extends Controller {


	public function __construct(Type $type){

		/**
		*
		*Middleware accessibility for only authenticated users
		**/
		$this->middleware('auth');
		$this->type=$type;
		
	}


	public function index()
	{

		$types = $this->type->orderBy('id', 'desc')->paginate(10);

		return view('types.types', ['types' => $types]);
	
	}

	public function create()
	{
		
		return view('types.create');
	
	}

	public function store(CreateTypeRequest $request, Type $type)
	{
		
		$type->create($request->all());

		return redirect()->route('types.index');
	
	}

	
	public function show(Type $type)
	{

		return view('types.show', compact('type'));
	
	}

	public function edit(Type $type)
	{

		return view('types.edit', compact('type'));
	
	}

	public function update(Type $type, Request $request)
	{
	
		$type->fill($request->input())->save();

		return view('types.show', compact('type'));
	
	}

	public function destroy(Type $type)
	{
	
		$type->delete();

		return redirect('types');
	
	}

}
