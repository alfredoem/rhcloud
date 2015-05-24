<?php namespace Course\Http\Controllers\Admin;


use Course\Http\Requests\CreateResourceRequest;
use Course\Http\Requests\UpdateResourceRequest;
use Course\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Course\Resource;

class ResourceController extends Controller {


	public $resource = null;

	public function __construct()
	{
		$this->beforeFilter('@findResource', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function findResource(Route $route)
	{
		$this->resource = Resource::findOrFail($route->getParameter('resources'));
	}

	public function index(Request $request)
	{
		$resources = Resource::orderBy('id', 'DES')->paginate(5);

		$json = [
			'table' => view('admin.resources.partials.list', compact('resources'))->render(),
			'pagination' => $resources->render(),
		];

		if($request->ajax())
		{
			return response()->json($json);
		}

		return view('admin.resources.index', compact('resources'));
	}

	public function create()
	{
		return view('admin.resources.create');
	}

	public function store(CreateResourceRequest $request)
	{
		$res = new Resource;
		$request['image'] = $res->getImg();
		if($request['description'] == '')
		{
			$request['description'] = $res->getDescription();
		}

		Resource::create($request->all());
		return $this->index($request);

	}

	public function edit($id)
	{
		return view('admin.resources.edit', ['resource' => $this->resource])->render();
	}

	public function update($id, UpdateResourceRequest $request)
	{
		$this->resource->fill($request->all());
		$this->resource->save();

		return $this->index($request);
	}

	public function destroy($id, Request $request)
	{
		$this->resource->delete();

		if($request->ajax())
		{
			return $this->index($request);
		}
	}

}



