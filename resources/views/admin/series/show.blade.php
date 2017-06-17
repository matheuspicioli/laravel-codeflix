@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Descrição de série</h1>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('admin.series.edit',['series' => $series->id])) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('admin.series.destroy', ['series' => $series->id]))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['admin.series.destroy','series' => $series->id],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $series->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Título</th>
                                    <td>{{ $series->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Descrição</th>
                                    <td>{{ $series->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
