@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Descrição categoria</h1>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('admin.categories.edit',['category' => $category->id])) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('admin.categories.destroy', ['category' => $category->id]))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['admin.categories.destroy','category' => $category->id],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nome</th>
                                    <td>{{ $category->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
