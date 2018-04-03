<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forms\UserProfileForm;
use App\User;
use App\Models\Painel\State;
use App\Models\Painel\City;

class UserProfileController extends Controller
{
    
    public function edit(User $user)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(UserProfileForm::class, [
            'url' => route('users.profile.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user->profile,
            'data' => ['user' => $user]
        ]);
        return view('admin.users.profile.edit', compact('form'));
    }

    public function update(User $user)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
        }
        
        $form = \FormBuilder::create(UserProfileForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        //dd($data);
        $user->profile->address?$user->profile->update($data):$user->profile()->create($data);

        session()->flash('message', 'Perfil alterado com sucesso.');
        return redirect()->route('users.profile.update', ['user' => $user->id]);
    }


    
}
