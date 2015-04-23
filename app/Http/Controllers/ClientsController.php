<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\models\Client;

class ClientsController extends Controller {


	public function __construct(Client $client){

		/**
		*
		*Middleware accessibility for only authenticated users
		**/
		$this->middleware('auth');
		$this->client=$client;
		
	}


	public function index()
	{

		$clients = $this->client->orderBy('id', 'desc')->get();

		return view('clients.clients', ['clients' => $clients]);
	
	}

	public function create()
	{
		
		return view('clients.create');
	
	}

	public function store(CreateClientRequest $request, Client $client)
	{

		$client->create($request->all());

		return redirect()->route('clients.index');
	
	}

	
	public function show(Client $client)
	{

		return view('clients.show', compact('client'));
	
	}

	public function edit(Client $client)
	{

		return view('clients.edit', compact('client'));
	
	}

	public function update(Client $client, Request $request)
	{
	
		$client->fill($request->input())->save();

		return view('clients.show', compact('client'));
	
	}

	public function destroy(Client $client)
	{
	
		$client->delete();

		return redirect('clients');
	
	}

}
