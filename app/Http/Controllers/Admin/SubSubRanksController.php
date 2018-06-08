<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\SubSubRankForm;
use App\Models\Painel\SubSubRank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubSubRanksController extends Controller
{
    public function index()
    {
        if(Gate::denies('subRanks-view')){
            abort(403,"Não autorizado!");
        }

        $totalSubSubRanks = SubSubRank::count();
        $sub_sub_ranks = SubSubRank::paginate(10);
        return view('admin.sub_sub_ranks.index',compact('sub_sub_ranks', 'totalSubSubRanks'));
    }

    public function create()
    {
        if(Gate::denies('subRanks-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubSubRankForm::class, [
            'url' => route('sub_sub_ranks.store'),
            'method' => 'POST'
        ]);
        return view('admin.sub_sub_ranks.create', compact('form'));
    }

    public function store(Request $request)
    {
        if(Gate::denies('sub_sub_ranks-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubSubRankForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        SubSubRank::create($data);
        $request->session()->flash('message','Sub_Subcategoria criada com sucesso');
        return redirect()->route('sub_sub_ranks.index');
    }

    public function show(SubSubRank $sub_sub_rank)
    {
        if(Gate::denies('subRanks-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.sub_sub_ranks.show', compact('sub_sub_rank'));
    }


    public function edit(SubSubRank $sub_sub_rank)
    {
        if(Gate::denies('subRanks-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubSubRankForm::class, [
            'url' => route('sub_sub_ranks.update',['sub_sub_rank' => $sub_sub_rank->id]),
            'method' => 'PUT',
            'model' => $sub_sub_rank
        ]);

        return view('admin.sub_sub_ranks.edit', compact('form'));
    }


    public function update(SubSubRank $sub_sub_rank)
    {
        if(Gate::denies('subRanks-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubSubRankForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $sub_sub_rank->update($data);
        session()->flash('message','Sub_Subcategoria editada com sucesso');
        return redirect()->route('sub_sub_ranks.index');
    }


    public function destroy($id)
    {
        if(Gate::denies('subRanks-delete')){
            abort(403,"Não autorizado!");
        }

        $item = SubSubRank::find($id);
            if ($item->toolkits()->count() > 0){
            session()->flash('message','Está em uso, não pode ser deletada...');
                return redirect()
                    ->route('sub_sub_ranks.index');
                }
            

        $item->delete();
                session()->flash('message','Sub_Subcategoria excluída com sucesso');
                return redirect()
                ->route('sub_sub_ranks.index'); 
    }
}
