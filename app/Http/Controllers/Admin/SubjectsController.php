<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\SubjectForm;
use App\Models\Painel\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('subjects-view')){
            abort(403,"Não autorizado!");
        }

        $totalSubjects = Subject::count();
        $subjects = Subject::paginate(10);
        return view('admin.subjects.index',compact('subjects', 'totalSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('subjects-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubjectForm::class, [
            'url' => route('subjects.store'),
            'method' => 'POST'
        ]);
        return view('admin.subjects.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('subjects-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubjectForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Subject::create($data);
        $request->session()->flash('message','Disciplina criada com sucesso');
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        if(Gate::denies('subjects-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        if(Gate::denies('subjects-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubjectForm::class, [
            'url' => route('subjects.update',['subject' => $subject->id]),
            'method' => 'PUT',
            'model' => $subject
        ]);

        return view('admin.subjects.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Subject $subject)
    {
        if(Gate::denies('subjects-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubjectForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $subject->update($data);
        session()->flash('message','Patologia editada com sucesso');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        if(Gate::denies('subjects-delete')){
            abort(403,"Não autorizado!");
        }

        $item = Subject::find($id);
            if ($item->meetings()->count() > 0){
              return redirect()
                  ->route('subjects.index')
                  ->with('message','Está em uso, não pode ser deletada...');
            }
                
            $item->delete();
                return redirect()
                  ->route('subjects.index')
                  ->with('message','Patologia excluída com sucesso.'); 
    }
}
