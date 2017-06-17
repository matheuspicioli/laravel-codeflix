<?php

namespace CodeFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class SerieForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => 'Título'
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição'
            ]);
    }
}
