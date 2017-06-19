<?php
    $tabs = [
        [
            'title' => 'Informações',
            'link'  => !isset($video) ? route('admin.videos.create') : route('admin.videos.edit', ['video' => $video->id])
        ],
        [
            'title'     => 'Séries e categorias',
            'link'      => !isset($video) ? '#' : route('admin.videos.relations.create',['video' => $video->id]),
            'disabled'  => !isset($video) ? true : false
        ],
        [
            'title'     => 'Vídeo e thumbnail',
            'link'      => !isset($video) ? '#' : route('admin.videos.uploads.create',['video' => $video->id]),
            'disabled'  => !isset($video) ? true : false
        ]
    ];
?>

<h4 class="text-center"><b>Gerenciar vídeo</b></h4>
<div class="">
    {!! Button::link('Listar vídeos')->asLinkTo(route('admin.videos.index')) !!}
</div>
{!! Navigation::tabs($tabs) !!}
<div>
    {!! $slot !!}
</div>