<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PracticalRepository;
use Illuminate\Http\Request;

class PracticalController extends Controller {


	/**
	 * The PracticalRepository instance.
	 *
	 * @var App\Repositories\PracticalRepository
	 */
	protected $practical_gestion;


	public function __construct(PracticalRepository $practical_gestion){

		$this->practical_gestion = $practical_gestion;

	}




	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$counts = $this->practical_gestion->counts();
		$practicals = $this->practical_gestion->index(10);
		$links = str_replace('/?', '?', $practicals->render());

		return view('back.practical.index',compact('counts','practicals','links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('back.practical.create',$this->practical_gestion->create());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
