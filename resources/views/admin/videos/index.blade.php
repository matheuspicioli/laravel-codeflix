@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Vídeos</h1>
                        <div class="row">
                            {!! Button::primary('Novo vídeo')->asLinkTo(route('admin.videos.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        {!!
                            Table::withContents($videos->items())
                                ->striped()
                                ->callback('Descrição', function($field, $video){
                                    return MediaObject::withContents(
                                        [
                                            'image'     => $video->thumb_small_asset,
                                            'link'      => $video->file_asset,
                                            'heading'   => $video->title,
                                            'body'      => $video->description
                                        ]
                                    );
                                })
                                ->callback('Ações', function($field, $video){
                                    $linkEdit = route('admin.videos.edit',['video' => $video->id]);
                                    $linkShow = route('admin.videos.show',['video' => $video->id]);
                                    return Button::link(Icon::create('pencil'))->asLinkTo($linkEdit).'|'.
                                            Button::link(Icon::create('remove'))->asLinkTo($linkShow);
                                })
                        !!}
                    </div>
                    <div class="panel-body">
                        {!! $videos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style type="text/css">
        table > thead > tr > th:nth-child(3){
            width: 40%;
        }
    </style>
@endpush