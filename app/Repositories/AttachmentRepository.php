<?php namespace App\Repositories;

use App\Models\Attachment;

class AttachmentRepository extends BaseRepository{

    public function __construct(Attachment $attachment)
    {
        $this->model = $attachment;

    }


    public function save($name,$path,$user,$type,$id)
    {
        $attachment = new $this->model;
        $attachment->name = $name;
        $attachment->path = $path;
        $attachment->user_id = $user;

        if ($type == "lection"){
            $attachment->lection_id = $id;
        }

        $attachment->save();

        return $attachment;
    }


    public function addDownload($id){

    }



}