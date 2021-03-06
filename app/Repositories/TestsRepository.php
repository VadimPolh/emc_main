<?php namespace App\Repositories;


use  App\Models\Objects, App\Models\Tests, App\Models\Topics;
use App\Repositories\UserRepository;
use App\Services\Medias;


class TestsRepository extends BaseRepository
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
    public function __construct(Objects $objects, Tests $test, UserRepository $user_gestion,Topics $topics)
    {
        $this->objects = $objects;
        $this->model = $test;
        $this->user_gestion = $user_gestion;
        $this->topics = $topics;

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
        $topics = $this->topics->all()->lists('name','id');


        return compact('select','url','topics');
    }

    public function store($inputs)
    {
        $test = new $this->model;

        $this->save($test, $inputs);

        return $test;
    }

    private function save($test, $inputs)
    {
        $test->name = $inputs['title'];
        $test->summary = $inputs['test-content'];
        $test->objects_id = $inputs['objects_id'];

        $test->save();
    }


    public function getBySlug($slug)
    {

        return Tests::findBySlug($slug);

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

    public function destroy($id)
    {
        $lection = $this->getById($id);
        $lection->delete();
    }
}