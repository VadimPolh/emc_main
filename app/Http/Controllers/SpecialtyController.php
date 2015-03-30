<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SpecialtyRepository;
use App\Http\Requests\SpecialtyCreateRequest;



use Illuminate\Http\Request;

class SpecialtyController extends Controller {

  
  
  
  public function __construct(SpecialtyRepository  $specialty_gestion){
    	$this->specialty_gestion = $specialty_gestion;
  }
  
  
  
  
  /**
	 * The SpecialtyRepository instance.
	 *
	 * @var App\Repositories\SpecialtyRepository
	 */
	protected $specialty_gestion;
  
  
  
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $counts = $this->specialty_gestion->counts();
    $specialty = $this->specialty_gestion->index(4);
    $links = str_replace('/?', '?', $specialty->render());
    
		
    return view('back.specialty.index',compact('counts','links','specialty'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('back.specialty.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SpecialtyCreateRequest $request)
	{
		
    
    $this->specialty_gestion->store($request->all());
    
    return redirect('specialty')->with('ok', trans('back/specialty.created'));
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