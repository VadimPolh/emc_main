<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ObjectRepository;

class ObjectsController extends Controller {

 
  /**
	 * The ObjectsRepository instance.
	 *
	 * @var App\Repositories\ObjectsRepository
	 */
	protected $object_gestion;
  
  
	
  
  public function __construct(ObjectRepository $object_gestion)
	{
		$this->object_gestion = $object_gestion;
	}
  
  
  /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

   	$counts = $this->object_gestion->counts();	
    $objects = $this->object_gestion->index(10);
    $links = str_replace('/?', '?', $objects->render());
    
    return view('back.objects.index',compact("counts","objects","links"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('back.objects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
    
    
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
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		

		
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
