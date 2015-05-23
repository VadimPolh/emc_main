<?php namespace App\Repositories;

use App\Models\Attachment;

class AttachmentRepository extends BaseRepository{

    public function __construct(Attachment $attachment)
    {
        $this->model = $attachment;

    }


    public function save($name,$path,$user)
    {
        $attachment = new $this->model;
        $attachment->name = $name;
        $attachment->path = $path;
        $attachment->user_id = $user;
        $attachment->save();

        return $attachment;
    }


    public function addDownload($id){

    }



}