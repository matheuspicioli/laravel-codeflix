<?php

namespace CodeFlix\Forms;

use CodeFlix\Models\Category;
use CodeFlix\Models\Serie;
use Kris\LaravelFormBuilder\Form;

class VideoRelationForm extends Form
{
    public function buildForm()
    {
        $this->add('categories', 'entity', [
            'class'     => Category::class,
            'property'  => 'name',
            //'selected'  => $this->model ? $this->model->categories->pluck('id')->toArray() : null,
            //essa linha não precisa, a library já faz o select automatico das N categorias
            'multiple'  => true,
            'attr'      => [
                'name' => 'categories[]'
            ],
            'label'     => 'Categorias'
        ])
            ->add('serie_id', 'entity', [
                'class'         => Serie::class,
                'property'      => 'title',
                'empty_value'   => 'Selecione a série',
                'label'         => 'Série'
            ]);
    }
}