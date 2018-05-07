<?php

use Illuminate\Database\Seeder;
use App\Models\Painel\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users1 = Permission::firstOrCreate([
            'name' =>'users-view',
            'description' =>'Acesso a lista de usuários'
        ]);
        $users2 = Permission::firstOrCreate([
            'name' =>'users-create',
            'description' =>'Adicionar usuários'
        ]);
        $users3 = Permission::firstOrCreate([
            'name' =>'users-edit',
            'description' =>'Editar usuários'
        ]);
        $users4 = Permission::firstOrCreate([
            'name' =>'users-delete',
            'description' =>'Deletar usuários'
        ]);
  
        $roles1 = Permission::firstOrCreate([
            'name' =>'role-view',
            'description' =>'Listar papéis'
        ]);
        $roles2 = Permission::firstOrCreate([
            'name' =>'role-create',
            'description' =>'Adicionar papéis'
        ]);
        $roles3 = Permission::firstOrCreate([
            'name' =>'role-edit',
            'description' =>'Editar papéis'
        ]);
  
        $roles4 = Permission::firstOrCreate([
            'name' =>'role-delete',
            'description' =>'Deletar papéis'
        ]);

        $favorites1 = Permission::firstOrCreate([
            'name' =>'favorites-view',
            'description' =>'Acesso aos favoritos'
        ]);

        $favorites2 = Permission::firstOrCreate([
            'name' =>'favorites-create',
            'description' =>'Adicionar favoritos'
        ]);
  
        $favorites3 = Permission::firstOrCreate([
            'name' =>'favorites-delete',
            'description' =>'Deletar favoritos'
        ]);

        $perfil1 = Permission::firstOrCreate([
            'name' =>'perfil-view',
            'description' =>'Acesso ao perfil'
        ]);

        $perfil2 = Permission::firstOrCreate([
            'name' =>'perfil-edit',
            'description' =>'Atualizar perfil'
        ]);

        $products1 = Permission::firstOrCreate([
            'name' =>'products-view',
            'description' =>'Listar produtos'
        ]);

        $products2 = Permission::firstOrCreate([
            'name' =>'products-create',
            'description' =>'Adicionar produtos'
        ]);

        $products3 = Permission::firstOrCreate([
            'name' =>'products-edit',
            'description' =>'Editar produtos'
        ]);

        $products4 = Permission::firstOrCreate([
            'name' =>'products-delete',
            'description' =>'Deletar produtos'
        ]);
  
        $permission1 = Permission::firstOrCreate([
            'name' =>'permission-view',
            'description' =>'Acesso ao perfil'
        ]);
  
        $calls1 = Permission::firstOrCreate([
            'name' =>'calls-view',
            'description' =>'Acesso aos chamados'
        ]);
  
        $calls2 = Permission::firstOrCreate([
            'name' =>'calls-create',
            'description' =>'Acesso aos chamados'
        ]);
        $calls3 = Permission::firstOrCreate([
            'name' =>'calls-edit',
            'description' =>'Acesso aos chamados'
        ]);
        $calls4 = Permission::firstOrCreate([
            'name' =>'calls-delete',
            'description' =>'Acesso aos chamados'
        ]);
        
        $clients1 = Permission::firstOrCreate([
            'name' =>'clients-view',
            'description' =>'Acesso a lista de clientes'
        ]);
        $clients2 = Permission::firstOrCreate([
            'name' =>'clients-create',
            'description' =>'Adicionar clientes'
        ]);
        $clients3 = Permission::firstOrCreate([
            'name' =>'clients-edit',
            'description' =>'Editar clientes'
        ]);
        $clients4 = Permission::firstOrCreate([
            'name' =>'clients-delete',
            'description' =>'Deletar clientes'
        ]);

        $imagens1 = Permission::firstOrCreate([
            'name' =>'imagens-view',
            'description' =>'Acesso a lista de imagens'
        ]);
        $imagens2 = Permission::firstOrCreate([
            'name' =>'imagens-create',
            'description' =>'Adicionar imagens'
        ]);
        $imagens3 = Permission::firstOrCreate([
            'name' =>'imagens-edit',
            'description' =>'Editar imagens'
        ]);
        $imagens4 = Permission::firstOrCreate([
            'name' =>'imagens-delete',
            'description' =>'Deletar imagens'
        ]);

        $researches1 = Permission::firstOrCreate([
            'name' =>'researches-view',
            'description' =>'Acesso a lista de pesquisas'
        ]);
        $researches2 = Permission::firstOrCreate([
            'name' =>'researches-create',
            'description' =>'Adicionar pesquisa'
        ]);
        $researches3 = Permission::firstOrCreate([
            'name' =>'researches-edit',
            'description' =>'Editar pesquisa'
        ]);
        $researches4 = Permission::firstOrCreate([
            'name' =>'researches-delete',
            'description' =>'Deletar pesquisas'
        ]);

        $slides1 = Permission::firstOrCreate([
            'name' =>'slides-view',
            'description' =>'Acesso a lista de slides'
        ]);
        $slides2 = Permission::firstOrCreate([
            'name' =>'slides-create',
            'description' =>'Adicionar slide'
        ]);
        $slides3 = Permission::firstOrCreate([
            'name' =>'slides-edit',
            'description' =>'Editar slide'
        ]);
        $slides4 = Permission::firstOrCreate([
            'name' =>'slides-delete',
            'description' =>'Deletar slide'
        ]);

        $documents1 = Permission::firstOrCreate([
            'name' =>'documents-view',
            'description' =>'Acesso a lista de documentos'
        ]);
        $documents2 = Permission::firstOrCreate([
            'name' =>'documents-create',
            'description' =>'Adicionar documento'
        ]);
        $documents3 = Permission::firstOrCreate([
            'name' =>'documents-edit',
            'description' =>'Editar documento'
        ]);
        $documents4 = Permission::firstOrCreate([
            'name' =>'documents-delete',
            'description' =>'Deletar documento'
        ]);

        $categories1 = Permission::firstOrCreate([
            'name' =>'categories-view',
            'description' =>'Acesso a lista de categorias das pesquisas'
        ]);
        $categories2 = Permission::firstOrCreate([
            'name' =>'categories-create',
            'description' =>'Adicionar categoria para as pesquisas'
        ]);
        $categories3 = Permission::firstOrCreate([
            'name' =>'categories-edit',
            'description' =>'Editar categoria das pesquisas'
        ]);
        $categories4 = Permission::firstOrCreate([
            'name' =>'categories-delete',
            'description' =>'Deletar categoria das pesquisas'
        ]);
        
        $sheets1 = Permission::firstOrCreate([
            'name' =>'sheets-view',
            'description' =>'Acesso a lista de fichas'
        ]);
        $sheets2 = Permission::firstOrCreate([
            'name' =>'sheets-create',
            'description' =>'Adicionar ficha'
        ]);
        $sheets3 = Permission::firstOrCreate([
            'name' =>'sheets-edit',
            'description' =>'Editar ficha'
        ]);
        $sheets4 = Permission::firstOrCreate([
            'name' =>'sheets-delete',
            'description' =>'Deletar ficha'
        ]);

        $subSheets1 = Permission::firstOrCreate([
            'name' =>'subSheets-view',
            'description' =>'Acesso a lista de fichas'
        ]);
        $subSheets2 = Permission::firstOrCreate([
            'name' =>'subSheets-create',
            'description' =>'Adicionar ficha'
        ]);
        $subSheets3 = Permission::firstOrCreate([
            'name' =>'subSheets-edit',
            'description' =>'Editar ficha'
        ]);
        $subSheets4 = Permission::firstOrCreate([
            'name' =>'subSheets-delete',
            'description' =>'Deletar ficha'
        ]);

        $subjects1 = Permission::firstOrCreate([
            'name' =>'subjects-view',
            'description' =>'Acesso a lista de patologias'
        ]);
        $subjects2 = Permission::firstOrCreate([
            'name' =>'subjects-create',
            'description' =>'Adicionar patologia'
        ]);
        $subjects3 = Permission::firstOrCreate([
            'name' =>'subjects-edit',
            'description' =>'Editar patologia'
        ]);
        $subjects4 = Permission::firstOrCreate([
            'name' =>'subjects-delete',
            'description' =>'Deletar patologia'
        ]);

        $typeChoices1 = Permission::firstOrCreate([
            'name' =>'typeChoices-view',
            'description' =>'Acesso a lista de tipos de alternativas'
        ]);
        $typeChoices2 = Permission::firstOrCreate([
            'name' =>'typeChoices-create',
            'description' =>'Adicionar tipo de alternativa'
        ]);
        $typeChoices3 = Permission::firstOrCreate([
            'name' =>'typeChoices-edit',
            'description' =>'Editar tipo de alternativa'
        ]);
        $typeChoices4 = Permission::firstOrCreate([
            'name' =>'typeChoices-delete',
            'description' =>'Deletar tipo de alternativa'
        ]);

        $listChoices1 = Permission::firstOrCreate([
            'name' =>'listChoices-view',
            'description' =>'Acesso a lista de alternativas'
        ]);
        $listChoices2 = Permission::firstOrCreate([
            'name' =>'listChoices-create',
            'description' =>'Adicionar alternativa'
        ]);
        $listChoices3 = Permission::firstOrCreate([
            'name' =>'listChoices-edit',
            'description' =>'Editar alternativa'
        ]);
        $listChoices4 = Permission::firstOrCreate([
            'name' =>'listChoices-delete',
            'description' =>'Deletar alternativa'
        ]);
        $Tools1 = Permission::firstOrCreate([
            'name' =>'tolls-view',
            'description' =>'Acesso a lista de recursos'
        ]);
        $Tools2 = Permission::firstOrCreate([
            'name' =>'tolls-create',
            'description' =>'Adicionar recurso'
        ]);
        $Tools3 = Permission::firstOrCreate([
            'name' =>'tolls-edit',
            'description' =>'Editar recurso'
        ]);
        $Tools4 = Permission::firstOrCreate([
            'name' =>'tolls-delete',
            'description' =>'Deletar recurso'
        ]);
        $Ranks1 = Permission::firstOrCreate([
            'name' =>'ranks-view',
            'description' =>'Acesso a lista de categorias dos recursos'
        ]);
        $Ranks2 = Permission::firstOrCreate([
            'name' =>'ranks-create',
            'description' =>'Adicionar categoria para os recursos'
        ]);
        $Ranks3 = Permission::firstOrCreate([
            'name' =>'ranks-edit',
            'description' =>'Editar categoria dos recursos'
        ]);
        $Ranks4 = Permission::firstOrCreate([
            'name' =>'ranks-delete',
            'description' =>'Deletar categoria dos recursos'
        ]);
        $subRanks1 = Permission::firstOrCreate([
            'name' =>'subRanks-view',
            'description' =>'Acesso a lista de subcategorias dos recursos'
        ]);
        $subRanks2 = Permission::firstOrCreate([
            'name' =>'subRanks-create',
            'description' =>'Adicionar subcategoria para os recursos'
        ]);
        $subRanks3 = Permission::firstOrCreate([
            'name' =>'subRanks-edit',
            'description' =>'Editar subcategoria dos recursos'
        ]);
        $subRanks4 = Permission::firstOrCreate([
            'name' =>'subRanks-delete',
            'description' =>'Deletar subcategoria dos recursos'
        ]);
        $subSubRanks1 = Permission::firstOrCreate([
            'name' =>'subSubRanks-view',
            'description' =>'Acesso a lista de sub_subcategorias dos recursos'
        ]);
        $subSubRanks2 = Permission::firstOrCreate([
            'name' =>'subSubRanks-create',
            'description' =>'Adicionar sub_subcategoria para os recursos'
        ]);
        $subSubRanks3 = Permission::firstOrCreate([
            'name' =>'subSubRanks-edit',
            'description' =>'Editar sub_subcategoria dos recursos'
        ]);
        $subSubRanks4 = Permission::firstOrCreate([
            'name' =>'subSubRanks-delete',
            'description' =>'Deletar sub_subcategoria dos recursos'
        ]);

    }
}
