<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\SubRankForm;
use App\Models\Painel\SubRank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubRanksController extends Controller
{
   public function index()
    {
        if(Gate::denies('subRanks-view')){
            abort(403,"Não autorizado!");
        }

        $totalSubRanks = SubRank::count();
        $sub_ranks = SubRank::paginate(10);
        return view('admin.sub_ranks.index',compact('sub_ranks', 'totalSubRanks'));
    }

    public function create()
    {
        if(Gate::denies('subRanks-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubRankForm::class, [
            'url' => route('sub_ranks.store'),
            'method' => 'POST'
        ]);
        return view('admin.sub_ranks.create', compact('form'));
    }

    public function store(Request $request)
    {
        if(Gate::denies('sub_ranks-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubRankForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        SubRank::create($data);
        $request->session()->flash('message','Subcategoria criada com sucesso');
        return redirect()->route('sub_ranks.index');
    }

    public function show(SubRank $sub_rank)
    {
        if(Gate::denies('subRanks-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.sub_ranks.show', compact('sub_rank'));
    }


    public function edit(SubRank $sub_rank)
    {
        if(Gate::denies('subRanks-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SubRankForm::class, [
            'url' => route('sub_ranks.update',['sub_rank' => $sub_rank->id]),
            'method' => 'PUT',
            'model' => $sub_rank
        ]);

        return view('admin.sub_ranks.edit', compact('form'));
    }


    public function update(SubRank $sub_rank)
    {
        if(Gate::denies('subRanks-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SubRankForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $sub_rank->update($data);
        session()->flash('message','Subcategoria editada com sucesso');
        return redirect()->route('sub_ranks.index');
    }


    public function destroy($id)
    {
        if(Gate::denies('subRanks-delete')){
            abort(403,"Não autorizado!");
        }

        $item = SubRank::find($id);
            if ($item->toolkits()->count() > 0){
            session()->flash('message','Está em uso, não pode ser deletada...');
                return redirect()
                    ->route('sub_ranks.index');
                }
            

        $item->delete();
                session()->flash('message','Subcategoria excluída com sucesso');
                return redirect()
                ->route('sub_ranks.index'); 
    }
}
