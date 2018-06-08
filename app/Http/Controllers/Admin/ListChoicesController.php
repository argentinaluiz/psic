<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\ListChoiceForm;
use App\Models\Painel\ListChoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListChoicesController extends Controller
{
    public function index()
    {
        if(Gate::denies('listChoices-view')){
            abort(403,"Não autorizado!");
        }

        $totalListChoices = ListChoice::count();
        $list_choices = ListChoice::paginate(10);
        return view('admin.list_choices.index',compact('list_choices', 'totalListChoices'));
    }

    public function create()
    {
        if(Gate::denies('listChoices-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(ListChoiceForm::class, [
            'url' => route('list_choices.store'),
            'method' => 'POST'
        ]);
        return view('admin.list_choices.create', compact('form'));
    }

    public function store(Request $request)
    {
        if(Gate::denies('listChoices-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(ListChoiceForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        ListChoice::create($data);
        $request->session()->flash('message','Alternativa criada com sucesso');
        return redirect()->route('list_choices.index');
    }

    public function show(ListChoice $list_choice)
    {
        if(Gate::denies('listChoices-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.list_choices.show', compact('list_choice'));
    }

    public function edit(ListChoice $list_choice)
    {
        if(Gate::denies('listChoices-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(ListChoiceForm::class, [
            'url' => route('list_choices.update',['list_choice' => $list_choice->id]),
            'method' => 'PUT',
            'model' => $list_choice
        ]);

        return view('admin.list_choices.edit', compact('form'));
    }

    public function update(ListChoice $list_choice)
    {
        if(Gate::denies('listChoices-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(ListChoiceForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $list_choice->update($data);
        session()->flash('message','Alternativa editada com sucesso');
        return redirect()->route('list_choices.index');
    }


    public function destroy($id)
    {
        if(Gate::denies('listChoices-delete')){
            abort(403,"Não autorizado!");
        }

        $item = ListChoice::find($id);
            if ($item->choosings()->count() > 0){
            session()->flash('message','Está em uso, não pode ser deletada...');
            return redirect()
                ->route('list_choices.index');
            }
                

        $item->delete();
            session()->flash('message','Alternativa excluída com sucesso');
            return redirect()
              ->route('list_choices.index'); 

    }
}
