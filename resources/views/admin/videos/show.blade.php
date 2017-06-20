@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Descrição do vídeo</h1>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('admin.videos.edit',['video' => $video->id])) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('admin.videos.destroy', ['video' => $video->id]))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['admin.videos.destroy','video' => $video->id],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $video->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Thumb</th>
                                    <td>
                                        <img src="{{ $video->thumb_asset }}" width="512" height="360" alt="Thumbnail">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Vídeo</th>
                                    <td>
                                        <a href="{{ $video->file_asset }}" target="_blank">Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Título</th>
                                    <td>{{ $video->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Descrição</th>
                                    <td>{{ $video->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
