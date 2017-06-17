@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Nova série</b></div>
                    <div class="panel-body">
                        {!!
                            form($form->add('btn-cadastrar', 'submit', [
                                'attr'  => ['class' => 'btn btn-primary btn-block'],
                                'label' => Icon::create('floppy-disk')
                            ]))
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
