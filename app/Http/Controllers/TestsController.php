<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LectionCreateRequest;
use App\Repositories\TestsRepository;
use App\Repositories\SpecialtyRepository;
use App\Repositories\ObjectRepository;

use Illuminate\Http\Request;

class TestsController extends Controller {





	public function __construct(TestsRepository $tests_gestion,SpecialtyRepository $specialty_gestion, ObjectRepository $object_gestion)
	{
		$this->tests_gestion = $tests_gestion;
		$this->specialty_gestion = $specialty_gestion;
		$this->object_gestion = $object_gestion;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$counts = $this->tests_gestion->counts();
		$tests = $this->tests_gestion->index(10);
		$links = str_replace('/?', '?', $tests->render());


		return view('back.tests.index',compact("counts","tests","links"));
	}

	public function showMain($spec,$group,$object,$test)
	{

		$user = \Auth::user();
		$specialty = $this->specialty_gestion->all();
		$obj = $this->object_gestion->getBySlug($object);
		$test = $this->tests_gestion->getBySlug($test);


		return view('front.inspinia.test.show',compact('user','specialty','obj','test'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('back.tests.create',$this->tests_gestion->create());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LectionCreateRequest $request)
	{
		$this->tests_gestion->store($request->all());

		return redirect('tests')->with('ok', trans('back/test.created'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
