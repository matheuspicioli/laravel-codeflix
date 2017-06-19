<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/06/17
 * Time: 08:53
 */

namespace CodeFlix\Media;


trait VideoPaths
{
    use ThumbPaths;

    public function getThumbFolderStorageAttribute()
    {
        return "videos/{$this->id}";
    }

    public function getThumbAssetAttribute()
    {
        //eturn route('admin.videos.thumb_asset', ['video' => $this->id]);
    }

    public function getThumbSmallAssetAttribute()
    {
        //return route('admin.videos.thumb_small_asset', ['video' => $this->id]);
    }

    public function getThumbDefaultAttribute()
    {
        return env('VIDEO_NO_THUMB');
    }
}