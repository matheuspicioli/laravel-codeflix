@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Descrição usuário</h1>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('admin.users.edit',['user' => $user->id])) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('admin.users.destroy', ['user' => $user->id]))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['admin.users.destroy','user' => $user->id],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nome</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
