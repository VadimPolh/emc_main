<?php namespace App\Repositories;

use  App\Models\Objects, App\Models\Specialty, App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Medias;

class ObjectRepository extends BaseRepository
{


    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user_gestion;

    public function __construct(Objects $objects, Specialty $specialty, User $user,UserRepository $user_gestion)
    {
        $this->model = $objects;
        $this->specialty = $specialty;
        $this->user = $user;
        $this->user_gestion = $user_gestion;

    }


    public function index($n)
    {

        return $this->model->paginate($n);
    }

    public function show($id)
    {

        $object = $this->model->with('lection')->findOrFail($id);


        return compact('object');
    }


    public function store($inputs)
    {
        $object = new $this->model;

        $this->save($object, $inputs);

        return $object;
    }


    private function save($object, $inputs)
    {
        $object->name = $inputs['name'];
        $object->user_id = $inputs['user_id'];
        $object->description = $inputs['description'];
        $object->save();

        $object->specialty()->attach($inputs['specialty_id']);
    }


    public function destroy($id)
    {
        $object = $this->getById($id);

        $object->specialty()->detach($object->specialty[0]->id);

        $object->delete();
    }


    public function edit($id)
    {
        $object = $this->getById($id);

        $select = $this->specialty->all()->lists('name', 'id');
        $select_user = $this->user->all()->lists('username', 'id');
        $url = Medias::getUrl($this->user_gestion);

        return compact('object', 'select', 'select_user','url');
    }


    public function create()
    {

        $select = $this->specialty->all()->lists('name', 'id');
        $select_user = $this->user->all()->lists('username', 'id');
        $url = Medias::getUrl($this->user_gestion);

        return compact('select', 'select_user','url');
    }

    public function counts()
    {
        return $this->model->count();
    }

    public function getBySlug($slug)
    {

        return Objects::findBySlug($slug);

    }

    public function update($inputs, $id)
    {
        $object = $this->getById($id);

        $this->save($object, $inputs);
    }

}