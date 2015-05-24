<?php namespace App\Repositories;


use  App\Models\Objects, App\Models\Practical, App\Models\Topics, App\Models\Lection;
use App\Repositories\UserRepository;
use App\Services\Medias;


class PracticalRepository extends BaseRepository
{


    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user_gestion;


    /**
     * @param Objects $objects
     * @param Practical $Practical
     * @param \App\Repositories\UserRepository $user_gestion
     */
    public function __construct(Objects $objects, Practical $Practical, UserRepository $user_gestion,Topics $topics,Lection $lection)
    {
        $this->objects = $objects;
        $this->model = $Practical;
        $this->user_gestion = $user_gestion;
        $this->topics = $topics;
        $this->lection = $lection;


    }

    /**
     * @param $n
     * @return mixed
     */
    public function index($n)
    {

        return $this->model->paginate($n);
    }


    public function show($id)
    {

        $Practical = $this->model->findOrFail($id);


        return compact('Practical');
    }


    public function create(){
        $select = $this->objects->all()->lists('name', 'id');
        $url = Medias::getUrl($this->user_gestion);
        $topics = $this->topics->all()->lists('name','id');
        $lections = $this->lection->all()->lists('title','id');

        return compact('select','url','topics','lections');
    }

    public function store($inputs)
    {
        $Practical = new $this->model;

        $this->save($Practical, $inputs);

        return $Practical;
    }

    private function save($Practical, $inputs)
    {
        $Practical->title = $inputs['title'];
        $Practical->summary = $inputs['summary'];
        $Practical->objects_id = $inputs['objects_id'];
        $Practical->topics_id = $inputs['topics_id'];
        $Practical->lection_id = $inputs['lections_id'];


        $Practical->save();


    }


    public function getBySlug($slug)
    {

        return Practical::findBySlug($slug);

    }

    public function edit($id)
    {
        $Practical = $this->getById($id);

        $select = $this->objects->all()->lists('name', 'id');
        $url = Medias::getUrl($this->user_gestion);

        return compact('Practical','select','url');
    }

    /**
     * @return mixed
     */
    public function counts()
    {
        return $this->model->count();
    }


    public function update($inputs, $id)
    {
        $Practical = $this->getById($id);

        $this->save($Practical, $inputs);
    }


}