<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\SheetForm;
use App\Models\Painel\Sheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SheetsController extends Controller
{

    public function index()
    {
        if(Gate::denies('sheets-view')){
            abort(403,"Não autorizado!");
        }

        $totalSheets = Sheet::count();
        $sheets = Sheet::paginate(10);
        return view('admin.sheets.index',compact('sheets', 'totalSheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('sheets-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SheetForm::class, [
            'url' => route('sheets.store'),
            'method' => 'POST'
        ]);
        return view('admin.sheets.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('sheets-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SheetForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Sheet::create($data);
        $request->session()->flash('message','Ficha criada com sucesso');
        return redirect()->route('sheets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painel\Sheet
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet)
    {
        if(Gate::denies('sheets-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.sheets.show', compact('sheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painel\Sheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheet $sheet)
    {
        if(Gate::denies('sheets-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SheetForm::class, [
            'url' => route('sheets.update',['sheet' => $sheet->id]),
            'method' => 'PUT',
            'model' => $sheet
        ]);

        return view('admin.sheets.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Painel\Sheet
     * @return \Illuminate\Http\Response
     */
    public function update(Sheet $sheet)
    {
        if(Gate::denies('sheets-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SheetForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $sheet->update($data);
        session()->flash('message','Ficha editada com sucesso');
        return redirect()->route('sheets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painel\Sheet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('sheets-delete')){
            abort(403,"Não autorizado!");
        }
        $item = Sheet::find($id);
            if ($item->meetings()->count() > 0){

              return redirect()
                  ->route('sheets.index')
                  ->with('message','Está em uso, não pode ser deletada...');
            }
                

            $item->delete();
                return redirect()
                  ->route('sheets.index')
                  ->with('message','Ficha excluída com sucesso.');
                   
    }
}
