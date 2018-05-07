<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\ToolRequest;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use App\Forms\ToolForm;

use App\Models\Painel\Tool;
use App\Models\Painel\Document;
use App\Models\Painel\Toolkit;


class ToolsController extends Controller
{
    private $tool;
    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
    }

    public function index()
    {
        if(Gate::denies('tools-view')){
            abort(403,"Não autorizado!");
          }
          
          $totalTools   = Tool::count();
          $tools = Tool::orderBy("id","DESC")->paginate(10);
         
          return view('admin.tools.index',compact('tools', 'totalTools'));
    }


    public function create()
    {
        if(Gate::denies('tools-create')){
            abort(403,"Não autorizado!");
          }
    
          $form = \FormBuilder::create(ToolForm::class, [
            'url' => route('tools.store'),
            'method' => 'POST'
          ]);
    
          return view('admin.tools.create',compact('form'));
    }

    public function store(ToolRequest $request)
    {
        if(Gate::denies('tools-create')){
            abort(403,"Não autorizado!");
        }
        $nameFile = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) { 
            $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if (!$request->image->storeAs('tool', $nameFile))
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }

        if ( $this->tool->newTool($request, $nameFile) ) 
        return redirect()
                            ->route('tools.index')
                            ->with('message', 'Recurso criada com sucesso!');
            else
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao cadastrar')
                            ->withInput();

    }

    public function show(Tool $tool)
    {
        if(Gate::denies('tools-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.tools.show', compact('tool'));
    }

    public function edit(Tool $tool)
    {
        if(Gate::denies('tools-edit')){
            abort(403,"Não autorizado!");
          }

        $form = \FormBuilder::create(ToolForm::class, [
            'url' => route('tools.update',['tool' => $tool->id]),
            'method' => 'PUT',
            'model' => $tool
        ]);

          return view('admin.tools.edit',compact('form', 'tool'));

    }

    public function update(ToolRequest $request, $id)
    {
        if(Gate::denies('tools-edit')){
            abort(403,"Não autorizado!");
        }

        $tool = $this->tool->find($id);
        if(!$tool) return redirect()->back();

        $nameFile = $tool->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            if($tool->image)
                $nameFile = $tool->image;
            else
                $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if (!$request->image->storeAs('tool', $nameFile))
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }
        

        if ( $tool->updateTool($request, $nameFile) )
            return redirect()
                            ->route('tools.index')
                            ->with('message', 'Recurso alterado com sucesso!');
            else
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao atualizar')
                            ->withInput();
    }

    public function destroy(Tool $tool)
    {
        if(Gate::denies('tools-delete')){
            abort(403,"Não autorizado!");
          }
    
          foreach ($tool->categories as $key => $value) {
            $tool->categories()->detach($value);
          }
    
        /*  foreach ($tool->imagens as $key => $value) {
            $value->delete();
          }
        */
    
          $tool->delete();
          return redirect()->route('tools.index');
    }

    public function indexToolkit(Tool $tool)
    {
      if(Gate::denies('tools-edit')){
        abort(403,"Não autorizado!");
      }

      $form = \FormBuilder::create(ToolForm::class, [
        'url' => route('tools.update',['tool' => $tool->id]),
        'method' => 'PUT',
        'model' => $tool
      ]);
      
      $registros = $tool->documents()->where('deleted','=','N')->orderBy('order')->paginate(10);

      return view('admin.tools.toolkit',compact('registros','tool', 'form'));
    }

    public function createToolkit(Tool $tool)
    {
      if(Gate::denies('tools-edit')){
        abort(403,"Não autorizado!");
      }

      if($tool->documents()->where('deleted','=','N')->count()){
        $documentsTool = $tool->documents()->where('deleted','=','N')->get();
      }else{
        $documentsTool = null;
      }

      $documents = Document::where('deleted','=','N')->orderBy('id','DESC')->paginate(10);

      return view('admin.tools.documents',compact('documents','tool','documentsTool'));
    }

    public function storeToolkit(Request $request)
    {
      if(Gate::denies('tools-edit')){
        abort(403,"Não autorizado!");
      }

      $data = $request->all();

      $tool = Tool::find($data['tool']);
      $document = Document::find($data['id']);

      $order= 1;
      if($tool->documents()->where('deleted','=','N')->count()){
        $aux = $tool->documents()->where('deleted','=','N')->orderBy('order','DESC')->first();
        $order = $aux->order + 1;
      }

      if($tool->documents()->where('document_id','=',$document->id)->count()){
        $aux = $tool->documents()->where('document_id','=',$document->id)->first();
        $aux->update(['deleted'=>'N','order'=>$order]);
      }else{
        $tool->documents()->create(['document_id'=>$document->id ,'link'=>$document->Url(), 'order'=> $order]);
      }

      return $tool->documents;
    }

    public function removeToolkit(Request $request)
    {
      if(Gate::denies('tools-edit')){
        abort(403,"Não autorizado!");
      }
      $data = $request->all();

      $tool = Tool::find($data['tool']);
      $document = Document::find($data['id']);

      if($tool->documents()->where('document_id','=',$document->id)->count() > 1){
        $toolkits = $tool->documents()->where('document_id','=',$document->id)->get();
        foreach ($toolkits as $toolkit) {
          $toolkit->update(['deleted'=>'S']);
        }
      }else{
        $toolkit = $tool->documents()->where('document_id','=',$document->id)->first();
        $toolkit->update(['deleted'=>'S']);
      }

      return $tool->documents;
    }

    public function editToolkit(Toolkit $toolkit)
    {
      if(Gate::denies('tools-edit')){
        abort(403,"Não autorizado!");
      }

      $registro = $toolkit;
      $tool = $toolkit->tool;

      return view('admin.tools.toolkit.edit',compact('registro'));
    }

    public function updateToolkit(Request $request, Toolkit $toolkit)
    {
      if(Gate::denies('tools-edit')){
        abort(403,"Não autorizado!");
      }

        $this->validate($request, [
          'order' => 'required|numeric',
         ]);

          $data = $request->all();
          $registro = $toolkit;
          $tool = $toolkit->tool;

          $registro->update($request->all());
          session()->flash('message','Recurso editado com sucesso');
          return redirect()->route('tools.toolkit', $tool);

      }

    public function deleteToolkit(Request $request,Toolkit $toolkit)
    {
      if(Gate::denies('tools-edit')){
        abort(403,"Não autorizado!");
      }

      $toolkit->update(['deleted'=>'S']); 
      session()->flash('message','Recurso excluído com sucesso');
      return redirect()->back();
    }
}
