<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\SubSheetForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\SubSheet;

class SubSheetsController extends Controller
{
    public function index()
    {
        if(Gate::denies('subSheets-view')){
            abort(403,"Não autorizado!");
        }

        $totalSubSheets = SubSheet::count();
        $sub_sheets = SubSheet::paginate(10);
        return view('admin.sub_sheets.index',compact('sub_sheets', 'totalSubSheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('subSheets-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubSheetForm::class, [
            'url' => route('sub_sheets.store'),
            'method' => 'POST'
        ]);
        return view('admin.sub_sheets.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('subSheets-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubSheetForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        SubSheet::create($data);
        $request->session()->flash('message','Subficha criada com sucesso');
        return redirect()->route('sub_sheets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painel\SubSheet
     * @return \Illuminate\Http\Response
     */
    public function show(SubSheet $sub_sheet)
    {
        if(Gate::denies('subSheets-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.sub_sheets.show', compact('sub_sheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painel\SubSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSheet $sub_sheet)
    {
        if(Gate::denies('subSheets-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubSheetForm::class, [
            'url' => route('sub_sheets.update',['sub_sheet' => $sub_sheet->id]),
            'method' => 'PUT',
            'model' => $sub_sheet
        ]);

        return view('admin.sub_sheets.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Painel\SubSheet
     * @return \Illuminate\Http\Response
     */
    public function update(SubSheet $sub_sheet)
    {
        if(Gate::denies('subSheets-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubSheetForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $sub_sheet->update($data);
        session()->flash('message','Subficha editada com sucesso');
        return redirect()->route('sub_sheets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painel\SubSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('subSheets-delete')){
            abort(403,"Não autorizado!");
        }
        $item = SubSheet::find($id);
        if ($item->meetings()->count() > 0){
          return redirect()
              ->route('sub_sheets.index')
              ->with('message','Está em uso, não pode ser deletada...');
        }
            

        $item->delete();
            return redirect()
              ->route('sub_sheets.index')
              ->with('message','Sub Ficha excluída com sucesso.');

    }
}
