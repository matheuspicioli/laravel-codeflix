<?php

namespace CodeFlix\Forms;

use Bootstrapper\Facades\Icon;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255'
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => "required|max:255|unique:users,email,$id"
            ]);
    }
}
