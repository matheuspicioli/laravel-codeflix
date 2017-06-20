<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/06/17
 * Time: 08:53
 */

namespace CodeFlix\Media;


trait SeriePaths
{
    use ThumbPaths;

    public function getThumbFolderStorageAttribute()
    {
        return "series/{$this->id}";
    }

    public function getThumbAssetAttribute()
    {
        return $this->isLocalDriver() ?
            route('admin.series.thumb_asset', ['serie' => $this->id]) :
            $this->thumb_path;
    }

    public function getThumbSmallAssetAttribute()
    {
        return $this->isLocalDriver() ?
            route('admin.series.thumb_small_asset', ['serie' => $this->id]) :
            $this->thumb_small_path;
    }

    public function getThumbDefaultAttribute()
    {
        return env('SERIE_NO_THUMB');
    }
}