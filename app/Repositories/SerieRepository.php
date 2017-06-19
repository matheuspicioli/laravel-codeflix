<?php

namespace CodeFlix\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SerieRepository
 * @package namespace Codeflix\Repositories;
 */
interface SerieRepository extends RepositoryInterface
{
    public function uploadThumb($id, UploadedFile $file);
}