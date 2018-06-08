<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\TypeChoiceForm;
use App\Models\Painel\TypeChoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeChoicesController extends Controller
{

    public function index()
    {
        if(Gate::denies('typeChoices-view')){
            abort(403,"Não autorizado!");
        }

        $totalTypeChoices = TypeChoice::count();
        $type_choices = TypeChoice::paginate(10);
        return view('admin.type_choices.index',compact('type_choices', 'totalTypeChoices'));
    }

    public function create()
    {
        if(Gate::denies('typeChoices-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(TypeChoiceForm::class, [
            'url' => route('type_choices.store'),
            'method' => 'POST'
        ]);
        return view('admin.type_choices.create', compact('form'));
    }

    public function store(Request $request)
    {
        if(Gate::denies('typeChoices-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(TypeChoiceForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        TypeChoice::create($data);
        $request->session()->flash('message','Tipo de alternativa criada com sucesso');
        return redirect()->route('type_choices.index');
    }

    public function show(TypeChoice $type_choice)
    {
        if(Gate::denies('typeChoices-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.type_choices.show', compact('type_choice'));
    }

    public function edit(TypeChoice $type_choice)
    {
        if(Gate::denies('typeChoices-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(TypeChoiceForm::class, [
            'url' => route('type_choices.update',['type_choice' => $type_choice->id]),
            'method' => 'PUT',
            'model' => $type_choice
        ]);

        return view('admin.type_choices.edit', compact('form'));
    }

    public function update(TypeChoice $type_choice)
    {
        if(Gate::denies('typeChoices-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(TypeChoiceForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $type_choice->update($data);
        session()->flash('message','Tipo de alternativa editada com sucesso');
        return redirect()->route('type_choices.index');
    }


    public function destroy($id)
    {
        if(Gate::denies('typeChoices-delete')){
            abort(403,"Não autorizado!");
        }
        $item = TypeChoice::find($id);
            if ($item->choosings()->count() > 0){
            session()->flash('message','Está em uso, não pode ser deletada...');
            return redirect()
                ->route('type_choices.index');
            }
                

        $item->delete();
            session()->flash('message','Tipo de alternativa excluída com sucesso');
            return redirect()
              ->route('type_choices.index'); 
    }
}
