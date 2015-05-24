<?php namespace Course\Http\Controllers\Admin;

use Course\Http\Requests;
use Course\Http\Controllers\Controller;

use Course\Http\Requests\CreateUserRequest;
use Course\Http\Requests\EditUserRequest;
use Course\Http\Requests\UpdatePasswordRequest;
use Course\User;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {


	public $user = null;

	public function __construct()
	{
		$this->beforeFilter('@findUser', ['only' => ['show', 'edit', 'update', 'destroy']]);
	}

	public function findUser(Route $route)
	{
		$this->user = User::findOrFail($route->getParameter('users'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$filter_name = $request->get('name');
		$filter_type = $request->get('type');
		$users = User::name($filter_name)
					->type($filter_type)
					->paginate();
		$json = [
			'table' => view('admin.users.partials.table', compact('users'))->render(),
			'pagination' => $users->appends(['name' => $filter_name, 'type' => $filter_type])->render(),
			'count' => $users->count(),
			'total' => $users->Total()
		];

		if($request->ajax())
		{
			return response()->json($json);
		}

		return view('admin.users.index', compact('users', 'filter_name', 'filter_type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{

 		$user = User::create($request->all());
		return redirect()->route('admin.users.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.users.edit')->with('user', $this->user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{	

		$this->user->fill($request->all());
		$this->user->save();
		// return redirect()->route('admin.users.index');
		session()->flash('message', $this->getSuccesUpdateMessage());
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{

		$message =  $this->getSuccesDeleteMessage($this->user->full_name);

		$this->user->delete();

		if($request->ajax()){
			return $message;
		}

		session()->flash('message', $message);

		return redirect()->route('admin.users.index');
	}

	protected function getSuccesDeleteMessage($user_name)
	{
		return trans('users.destroy.success', ['user' => $user_name]);
	}

	protected function getSuccesUpdateMessage()
	{
		return trans('users.update.success');
	}

	protected function getSuccesProfileUpdateMessage()
	{
		return trans('users.profile.success');
	}

	/*
	 * Profile
	 */

	public function showProfile()
	{
		$user = \Auth::user();
		return view('admin.users.profile', compact('user'));
	}

	public function updateProfile(UpdatePasswordRequest $request)
	{

		$user = \Auth::user();
		$user->password = $request->password;
		$user->save();

		$message = $this->getSuccesProfileUpdateMessage();
		session()->flash('message', $message);
		return redirect()->route('admin.users.index');
		
	}


}
