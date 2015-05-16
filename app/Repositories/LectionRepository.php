<?php namespace App\Repositories;


use  App\Models\Objects, App\Models\Lection;
use App\Repositories\UserRepository;
use App\Services\Medias;


class LectionRepository extends BaseRepository
{


    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user_gestion;


    /**
     * @param Objects $objects
     * @param Lection $lection
     * @param \App\Repositories\UserRepository $user_gestion
     */
    public function __construct(Objects $objects, Lection $lection, UserRepository $user_gestion)
    {
        $this->objects = $objects;
        $this->model = $lection;
        $this->user_gestion = $user_gestion;

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

        $lection = $this->model->findOrFail($id);


        return compact('lection');
    }


    public function create(){
        $select = $this->objects->all()->lists('name', 'id');
        $url = Medias::getUrl($this->user_gestion);
        return compact('select','url');
    }

    public function store($inputs)
    {
        $lection = new $this->model;

        $this->save($lection, $inputs);

        return $lection;
    }

    private function save($lection, $inputs)
    {
        $lection->title = $inputs['title'];
        $lection->summary = $inputs['summary'];
        $lection->objects_id = $inputs['objects_id'];


        $lection->save();


    }


    public function edit($id)
    {
        $lection = $this->getById($id);

        $select = $this->objects->all()->lists('name', 'id');
        $url = Medias::getUrl($this->user_gestion);

        return compact('lection','select','url');
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
        $lection = $this->getById($id);

        $this->save($lection, $inputs);
    }


}