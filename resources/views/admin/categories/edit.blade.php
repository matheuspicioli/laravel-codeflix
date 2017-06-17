@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Editar categoria</h1>
                    </div>
                    <div class="panel-body">
                        {!!
                            form($form->add('btn-editar', 'submit', [
                                'attr'  => ['class' => 'btn btn-primary btn-block'],
                                'label' => Icon::create('pencil')
                            ]))
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
