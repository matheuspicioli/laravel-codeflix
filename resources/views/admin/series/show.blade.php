@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Descrição de série</h1>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('admin.series.edit',['serie' => $serie->id])) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('admin.series.destroy', ['serie' => $serie->id]))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['admin.series.destroy','serie' => $serie->id],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $serie->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Título</th>
                                    <td>{{ $serie->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Descrição</th>
                                    <td>{{ $serie->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
