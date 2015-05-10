<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\LectionRepository;

use Illuminate\Http\Request;

class LectionController extends Controller
{


    /**
     * The LectionRepository instance.
     *
     * @var App\Repositories\LectionRepository
     */
    protected $object_gestion;


    public function __construct(LectionRepository $lection_gestion)
    {
        $this->lection_gestion = $lection_gestion;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $counts = $this->lection_gestion->counts();
        $lections = $this->lection_gestion->index(10);
        $links = str_replace('/?', '?', $lections->render());
    
		return view('back.lection.index', compact("counts","lections","links"));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
