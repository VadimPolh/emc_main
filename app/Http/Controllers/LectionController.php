<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\LectionRepository;
use App\Repositories\SpecialtyRepository;
use App\Repositories\ObjectRepository;
use App\Repositories\AttachmentRepository;
use App\Http\Requests\LectionCreateRequest;
use App\Http\Requests\LectionUpdateRequest;
use App\Models\Lection,App\Models\User,App\Models\Practical;

use Illuminate\Http\Request;

class LectionController extends Controller
{


    /**
     * The LectionRepository instance.
     *
     * @var App\Repositories\ObjectRepository
     */
    protected $object_gestion;


    public function __construct(LectionRepository $lection_gestion,SpecialtyRepository $specialty_gestion, ObjectRepository $object_gestion , AttachmentRepository $attachment_gestion)
    {
        $this->lection_gestion = $lection_gestion;
        $this->specialty_gestion = $specialty_gestion;
        $this->object_gestion = $object_gestion;
        $this->attachment_gestion = $attachment_gestion;

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

    public function upload(){


        $author = \Input::get('user_id');
        $file = \Input::file('file');
        $type = \Input::get('type');
        $id = \Input::get('id');
        $folder = public_path('attachment'. '/' . $type . '/' . $id);

        $filename = $file->getClientOriginalName();
        $upload_success = \Request::file('file')->move($folder, $filename);

        $this->attachment_gestion->save($filename,$folder.'/'.$filename,$author,$type,$id);


        if( $upload_success ) {
            return \Response::json('success', 200);
        } else {
            return \Response::json('error', 400);
        }

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

    public function search(){

        $keywords = \Input::get('keywords');
        $result = Lection::search($keywords)->get();
        $practical = Practical::search($keywords)->get();
        $user = User::with('group')->get()->find(\Auth::id());
        $specialty = $this->specialty_gestion->getById($user->group->specialty_id);

       return view('front.inspinia.search.result',compact('result','keywords','user','specialty'));

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
        $this->lection_gestion->destroy($id);

        return redirect('lection')->with('ok', trans('back/lection.destroyed'));
    }

    public function showMain($spec,$group,$object,$lections)
    {

        $user = \Auth::user();
        $specialty = $this->specialty_gestion->all();
        $obj = $this->object_gestion->getBySlug($object);
        $lection = $this->lection_gestion->getBySlug($lections);


        return view('front.inspinia.lection.show',compact('user','specialty','obj','lection'));
    }

}
