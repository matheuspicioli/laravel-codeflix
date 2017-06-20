<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 20/06/17
 * Time: 08:12
 */

namespace CodeFlix\Media;

use Illuminate\Http\UploadedFile;

trait VideoUploads
{
    public function uploadFile($id, UploadedFile $file)
    {
        $model = $this->find($id);
        $name = $this->upload($model, $file, 'file');

        if($name){
            $this->deleteFileOld($model);
            $model->file = $name;
            $model->save();
        }

        return $name;
    }

    protected function deleteFileOld($model)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        if($storage->exists($model->file_relative))
            $storage->delete($model->file_relative);
    }
}