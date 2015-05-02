<?php namespace App\Repositories;

use  App\Models\Objects, App\Models\Specialty, App\Models\User;

class ObjectRepository extends BaseRepository
{


    public function __construct(Objects $objects, Specialty $specialty, User $user)
    {
        $this->model = $objects;
        $this->specialty = $specialty;
        $this->user = $user;

    }


    public function index($n)
    {

        return $this->model->paginate($n);
    }

    public function show($id)
    {

        $object = $this->model->findOrFail($id);


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

        return compact('object', 'select', 'select_user');
    }


    public function create()
    {

        $select = $this->specialty->all()->lists('name', 'id');
        $select_user = $this->user->all()->lists('username', 'id');
        return compact('select', 'select_user');
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