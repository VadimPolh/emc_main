<?php namespace App\Repositories;


use  App\Models\Objects, App\Models\Lection;


class LectionRepository extends BaseRepository
{

    /**
     * @param Objects $objects
     * @param Lection $lection
     */
    public function __construct(Objects $objects, Lection $lection)
    {
        $this->objects = $objects;
        $this->model = $lection;

    }

    public function index($n)
    {

        return $this->model->paginate($n);
    }


    /**
     * @return mixed
     */
    public function counts()
    {
        return $this->model->count();
    }



}