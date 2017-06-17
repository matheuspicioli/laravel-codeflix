@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Usuarios</h1>
                        <div class="row">
                            {!! Button::primary('Nova categoria')->asLinkTo(route('admin.categories.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        {!!
                            Table::withContents($categories->items())
                                ->striped()
                                ->callback('Ações', function($field, $category){
                                    $linkEdit = route('admin.categories.edit',['user' => $category->id]);
                                    $linkShow = route('admin.categories.show',['user' => $category->id]);
                                    return Button::link(Icon::create('pencil'))->asLinkTo($linkEdit).'|'.
                                            Button::link(Icon::create('remove'))->asLinkTo($linkShow);
                                })
                        !!}
                    </div>
                    <div class="panel-body">
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
