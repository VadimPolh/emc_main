<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\LectionRepository;
use App\Repositories\SpecialtyRepository;
use App\Repositories\ObjectRepository;
use App\Http\Requests\LectionCreateRequest;
use App\Http\Requests\LectionUpdateRequest;

use Illuminate\Http\Request;

class LectionController extends Controller
{


    /**
     * The LectionRepository instance.
     *
     * @var App\Repositories\LectionRepository
     */
    protected $object_gestion;


    public function __construct(LectionRepository $lection_gestion,SpecialtyRepository $specialty_gestion, ObjectRepository $object_gestion)
    {
        $this->lection_gestion = $lection_gestion;
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

        return view('back.lection.create',$this->lection_gestion->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(LectionCreateRequest $request)
    {
        $this->lection_gestion->store($request->all());

        return redirect('lection')->with('ok', trans('back/lection.created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return view('back.lection.show',  $this->lection_gestion->show($id));
    }

    public function showMain($spec,$group,$object,$lection)
    {

        $user = \Auth::user();
        $specialty = $this->specialty_gestion->all();
        $obj = $this->object_gestion->getBySlug($object);
        $lection = $this->lection_gestion->getBySlug($lection);


        return view('front.inspinia.lection.show',compact('user','specialty','obj','lection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('back.lection.edit',  $this->lection_gestion->edit($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(LectionUpdateRequest $request, $id)
    {
        $this->lection_gestion->update($request->all(), $id);

        return redirect('lection')->with('ok', trans('back/lection.updated'));
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
