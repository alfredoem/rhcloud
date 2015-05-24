<?php namespace Course\Http\Controllers\Admin;


use Course\Http\Requests\StoreClientRequest;
use Course\Http\Requests\UpdateClientRequest;
use Course\Client;
use Course\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ClientController extends Controller {


	public $client = null;

	public function __construct()
	{
		$this->beforeFilter('@findClient', ['only' => ['show', 'edit', 'update','destroy']]);
	}

	public function findClient(Route $route)
	{
		$this->client = Client::findOrFail($route->getParameter('clients'));
	}

	public function index()
	{
		$clients = Client::paginate();
		return view('admin.clients.index', compact('clients'));
	}

	public function create()
	{
		return view('admin.clients.create');
	}

	public function store(StoreClientRequest $request)
	{
		$client = new Client;
		$client->create($request->all());
		return redirect()->route('admin.clients.index');
	}

	public function show($id)
	{

	}

	public function edit($id)
	{
		return view('admin.clients.edit')
					->with('client', $this->client);
	}

	public function update(UpdateClientRequest $request,$id)
	{
		$this->client->fill($request->all());
		$this->client->save();

		$message = $this->getSuccessUpdateMessage();

		session()->flash('message', $message);
		return redirect()->route('admin.clients.index');
	}



	public function destroy($id, Request $request)
	{
		//$this->client->delete();
		$message = $this->getSuccessDestroyMessage($this->client->full_name);


		if($request->ajax())
		{
			return $message;
		}

		/*session()->flash('message', $message);
		return redirect()->back();*/


		
	}

	public function getSuccessUpdateMessage()
	{
		return 'Los cambios han sido guardados con exito!';
	}

	public function getSuccessDestroyMessage($name)
	{
		return "El cliente $name ha sido eliminado!";
	}




}
