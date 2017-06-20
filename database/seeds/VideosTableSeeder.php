<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;
use CodeFlix\Repositories\VideoRepository;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Collection $series */
        $series     = \CodeFlix\Models\Serie::all();
        $categories = \CodeFlix\Models\Category::all();

        $repository = app(VideoRepository::class);
        $collectionThumbs = $this->getThumbs();
        $collectionVideos = $this->getVideos();
        factory(\CodeFlix\Models\Video::class, 2)
            ->create()->each(function($video) use (
                $series,
                $categories,
                $repository,
                $collectionThumbs,
                $collectionVideos){
                    $repository->uploadThumb($video->id, $collectionThumbs->random());
                    $repository->uploadFile($video->id, $collectionVideos->random());
                    $video->categories()->attach($categories->random(4)->pluck('id'));
                    $numero = rand(1, 3);
                    if($numero % 2 == 0){
                        $serie = $series->random();
                        //$video->serie_id = $serie->id;
                        $video->serie()->associate($serie);
                        $video->save();
                    }
            });
    }

    protected function getThumbs(){
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/thumbs/thumb.jpg'),
                'thumb.jpg'
            )
        ]);
    }

    protected function getVideos(){
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/videos/video.mp4'),
                'video.mp4'
            )
        ]);
    }
}
