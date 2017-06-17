<?php

namespace CodeFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class UserSettingForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('password', 'password', [
                'rules' => 'required|min:6|max:16|confirmed',
                'label' => 'Senha'
            ])
            ->add('passwor_confirmation', 'password', [
                'label' => 'Confirmação de senha'
            ]);
    }
}
