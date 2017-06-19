<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/06/17
 * Time: 08:49
 */

namespace CodeFlix\Media;


use Illuminate\Filesystem\FilesystemAdapter;

trait VideoStorages
{
    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    public function getStorage()
    {
        return \Storage::disk($this->getDiskDriver());
    }

    protected function getDiskDriver()
    {
        return config('filesystems.default');
    }

    protected function getAbsolutePath(FilesystemAdapter $storage, $fileRelativePath)
    {
        return $storage->getDriver()->getAdapter()->applyPathPrefix($fileRelativePath);
    }
}