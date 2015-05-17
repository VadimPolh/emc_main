<?php namespace App\Repositories;


use  App\Models\Objects, App\Models\Lection, App\Models\Groups, App\Models\Specialty, App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Medias;


class GroupsRepository extends BaseRepository
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
    public function __construct(Groups $groups ,Objects $objects, Lection $lection, UserRepository $user_gestion, Specialty $specialty,User $user)
    {
        $this->objects = $objects;
        $this->model = $groups;
        $this->user_gestion = $user_gestion;
        $this->lection_gestion = $lection;
        $this->specialty = $specialty;
        $this->user = $user;

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
        $specialty = $this->specialty->all()->lists('name', 'id');
        $user = \DB::table('users')->whereNotIn('role_id', array(3))->lists('username','id');

        return compact('specialty', 'user');
    }

    public function store($inputs)
    {
        $group = new $this->model;

        $this->save($group, $inputs);

        return $group;
    }

    private function save($group, $inputs)
    {
        $group->name = $inputs['name'];
        $group->specialty_id = $inputs['specialty_id'];
        $group->user_id = $inputs['user_id'];


        $group->save();


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