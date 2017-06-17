<?php

namespace CodeFlix\Http\Controllers\Admin\Auth;

use CodeFlix\Forms\UserSettingForm;
use CodeFlix\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeFlix\Http\Controllers\Controller;

class UserSettingsController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $form = \FormBuilder::create(UserSettingForm::class, [
            'url'       => route('admin.user_settings.update'),
            'method'    => 'PUT'
        ]);

        return view('admin.auth.setting', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $form = \FormBuilder::create(UserSettingForm::class);

        if(!$form->isValid())
            return redirect()->back()->withErrors($form->getErrors())->withInput();

        $dados = $form->getFieldValues();
        $this->repository->update($dados, \Auth::user()->id);
        $request->session()->flash('message', 'Senha alterada com sucesso!');
        return redirect()->route('admin.user_settings.edit');
    }
}
