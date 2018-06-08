<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use App\Forms\CategoryForm;
use App\Models\Painel\Category;

class CategoriesController extends Controller
{

    public function index()
    {
        if(Gate::denies('categories-view')){
            abort(403,"Não autorizado!");
        }

        $totalCategories = Category::count();
        $categories = Category::paginate(10);
        return view('admin.categories.index',compact('categories', 'totalCategories'));
    }


    public function create()
    {
        if(Gate::denies('categories-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(CategoryForm::class, [
            'url' => route('categories.store'),
            'method' => 'POST'
        ]);
        return view('admin.categories.create', compact('form'));
    }


    public function store(Request $request)
    {
        if(Gate::denies('categories-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(CategoryForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Category::create($data);
        $request->session()->flash('message','Categoria criada com sucesso');
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        if(Gate::denies('categories-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        if(Gate::denies('categories-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(CategoryForm::class, [
            'url' => route('categories.update',['category' => $category->id]),
            'method' => 'PUT',
            'model' => $category
        ]);

        return view('admin.categories.edit', compact('form'));
    }

    public function update(Category $category)
    {
        if(Gate::denies('categories-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(CategoryForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $category->update($data);
        session()->flash('message','Categoria editada com sucesso');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        if(Gate::denies('categories-delete')){
            abort(403,"Não autorizado!");
        }
           
        /*foreach ($category->researches as $key => $value) {
            $category->researches()->detach($value);
          }
        */

        $item = Category::find($id);
            if ($item->sets()->count() > 0){
                session()->flash('message','Está em uso em uma pesquisa, não pode ser deletada...');
                return redirect()
                    ->route('categories.index');
            }
                

            $item->delete();
                session()->flash('message','Categoria excluída com sucesso');
                return redirect()
                  ->route('categories.index');   

       // $category->delete();
      //  session()->flash('message','Categoria excluída com sucesso');
      //  return redirect()->route('categories.index');
    }
}
