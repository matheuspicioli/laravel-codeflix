@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Usuários</h1>
                        <div class="row">
                            {!! Button::primary('Novo usuário')->asLinkTo(route('admin.users.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        {!!
                            Table::withContents($users->items())
                                ->striped()
                                ->callback('Ações', function($field, $user){
                                    $linkEdit = route('admin.users.edit',['user' => $user->id]);
                                    $linkShow = route('admin.users.show',['user' => $user->id]);
                                    return Button::link(Icon::create('pencil'))->asLinkTo($linkEdit).'|'.
                                            Button::link(Icon::create('remove'))->asLinkTo($linkShow);
                                })
                        !!}
                    </div>
                    <div class="panel-body">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
