<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\GroupsRepository;
use App\Repositories\SpecialtyRepository;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\LectionUpdateRequest;

use Illuminate\Http\Request;

class GroupsController extends Controller
{


    /**
     * The LectionRepository instance.
     *
     * @var App\Repositories\GroupsRepository
     */
    protected $groups_gestion;


    public function __construct(GroupsRepository $groups_gestion, SpecialtyRepository $specialty_gestion)
    {
        $this->groups_gestion = $groups_gestion;
        $this->specialty_gestion = $specialty_gestion;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $counts = $this->groups_gestion->counts();
        $groups = $this->groups_gestion->index(10);
        $specialty = $this->specialty_gestion->all();
        $links = str_replace('/?', '?', $groups->render());
    
		return view('back.groups.index',compact('counts','groups','links','specialty'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('back.groups.create',$this->groups_gestion->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(GroupCreateRequest $request)
    {
        $this->groups_gestion->store($request->all());

        return redirect('groups')->with('ok', trans('back/group.created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return view('back.group.show',  $this->groups_gestion->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('back.group.edit',  $this->groups_gestion->edit($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(LectionUpdateRequest $request, $id)
    {
        $this->groups_gestion->update($request->all(), $id);

        return redirect('group')->with('ok', trans('back/group.updated'));
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
