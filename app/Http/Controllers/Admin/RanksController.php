<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\RankForm;
use App\Models\Painel\Rank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RanksController extends Controller
{
    public function index()
    {
        if(Gate::denies('ranks-view')){
            abort(403,"Não autorizado!");
        }

        $totalRanks = Rank::count();
        $ranks = Rank::paginate(10);
        return view('admin.ranks.index',compact('ranks', 'totalRanks'));
    }

    public function create()
    {
        if(Gate::denies('ranks-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(RankForm::class, [
            'url' => route('ranks.store'),
            'method' => 'POST'
        ]);
        return view('admin.ranks.create', compact('form'));
    }

    public function store(Request $request)
    {
        if(Gate::denies('ranks-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(RankForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Rank::create($data);
        $request->session()->flash('message','Categoria criada com sucesso');
        return redirect()->route('ranks.index');
    }

    public function show(Rank $rank)
    {
        if(Gate::denies('ranks-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.ranks.show', compact('rank'));
    }


    public function edit(Rank $rank)
    {
        if(Gate::denies('ranks-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(RankForm::class, [
            'url' => route('ranks.update',['rank' => $rank->id]),
            'method' => 'PUT',
            'model' => $rank
        ]);

        return view('admin.ranks.edit', compact('form'));
    }


    public function update(Rank $rank)
    {
        if(Gate::denies('ranks-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(RankForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $rank->update($data);
        session()->flash('message','Categoria editada com sucesso');
        return redirect()->route('ranks.index');
    }


    public function destroy(Rank $rank)
    {
        if(Gate::denies('ranks-delete')){
            abort(403,"Não autorizado!");
        }

        $rank->delete();
        session()->flash('message','Categoria excluída com sucesso');
        return redirect()->route('ranks.index');
    }
}
