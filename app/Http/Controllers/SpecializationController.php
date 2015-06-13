<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SpecialtyRepository;
use App\Http\Requests\SpecialtyCreateRequest;
use App\Http\Requests\SpecialtyUpdateRequest;



use Illuminate\Http\Request;

class SpecializationController extends Controller {




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
        $specialty = $this->specialty_gestion->index(10);
        $links = str_replace('/?', '?', $specialty->render());


        return view('back.specialization.index',compact('counts','links','specialty'));
    }

    public function showSpecialty($spec){

        $user = \Auth::user();
        $specialty = $this->specialty_gestion->all();
        $spc = $this->specialty_gestion->getBySlug($spec);

        if ($spc != null){
            return view('front.inspinia.specialty.show',compact('user','specialty','spc'));
        }else{
            return response(view('errors.404'), 404);
        }


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
        return view('back.specialty.show',  $this->specialty_gestion->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('back.specialty.edit',  $this->specialty_gestion->edit($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(SpecialtyUpdateRequest $request,$id)
    {
        $this->specialty_gestion->update($request->all(), $id);

        return redirect('specialty')->with('ok', trans('back/specialty.updated'));
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
