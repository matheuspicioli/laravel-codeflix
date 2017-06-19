@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Séries</h1>
                        <div class="row">
                            {!! Button::primary('Nova série')->asLinkTo(route('admin.series.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        {!!
                            Table::withContents($series->items())
                                ->striped()
                                ->callback('Descrição', function($field, $serie){
                                    return MediaObject::withContents(
                                        [
                                            'image'     => $serie->thumb_small_asset,
                                            'link'      => '#',
                                            'heading'   => $serie->title,
                                            'body'      => $serie->description
                                        ]
                                    );
                                })
                                ->callback('Ações', function($field, $serie){
                                    $linkEdit = route('admin.series.edit',['serie' => $serie->id]);
                                    $linkShow = route('admin.series.show',['serie' => $serie->id]);
                                    return Button::link(Icon::create('pencil'))->asLinkTo($linkEdit).'|'.
                                            Button::link(Icon::create('remove'))->asLinkTo($linkShow);
                                })
                        !!}
                    </div>
                    <div class="panel-body">
                        {!! $series->links() !!}
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