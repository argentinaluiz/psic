<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Selecionar categoria</label>
                    <select class="form-control" name="ranks"></select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Selecionar subcategoria</label>
                    <select class="form-control" name="sub_ranks"></select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Selecionar sub_subcategoria</label>
                    <select class="form-control" name="sub_sub_ranks"></select>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary" @click="store()">Adicionar</button>
        <br/><br/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Categoria</th>
                <th>Subcategoria</th>
                <th>Sub_Subcategroia</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="toolkit in toolkits">
                <td>
                    <button type="button" class="btn btn-sm btn-link" @click="destroy(toolkit)">
                        <span class="glyphicon glyphicon-trash"></span> Excluir
                    </button>
                </td>
                <td>{{toolkit.rank.name}}</td>
                <td>{{toolkit.sub_rank.name}}</td>
                <td>{{toolkit.sub_sub_rank.name}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ADMIN_CONFIG from '../../services/adminConfig';
    import store from '../../store/store';
    import 'select2';

    export default {
        props: ['tool'],
        computed: {
            toolkits(){
                return store.state.classToolkit.toolkits;
            }
        },
        mounted(){
            store.dispatch('classToolkit/query', this.tool);
            let selects = [
                {
                    url: `${ADMIN_CONFIG.API_URL}/ranks`,
                    selector:"select[name=ranks]",
                    processResults(data){
                        return {
                            results: data.map((rank) => {
                                return {id: rank.id, text: rank.name}
                            })
                        }
                    }
                },
                {
                    url: `${ADMIN_CONFIG.API_URL}/sub_ranks`,
                    selector:"select[name=sub_ranks]",
                    processResults(data){
                        return {
                            results: data.map((sub_rank) => {
                                return {id: sub_rank.id, text: sub_rank.name}
                            })
                        }
                    }
                },
                {
                    url: `${ADMIN_CONFIG.API_URL}/sub_sub_ranks`,
                    selector:"select[name=sub_sub_ranks]",
                    processResults(data){
                        return {
                            results: data.map((sub_sub_rank) => {
                                return {id: sub_sub_rank.id, text: sub_sub_rank.name}
                            })
                        }
                    }
                }
            ];
            //funciona apenas no padrão ES6
            for(let item of selects){
                $(item.selector).select2({
                    ajax: {
                        url: item.url,
                        dataType: 'json',
                        delay: 250,
                        data(params){
                            return {
                                q: params.term
                            }
                        },
                        processResults: item.processResults
                    },
                    minimumInputLength: 1,
                });
            }
        },
        methods: {
            destroy(toolkit){
                if(confirm('Deseja remover este conjunto?')){
                    store.dispatch('classToolkit/destroy', {
                        toolkitId: toolkit.id,
                        toolId: this.tool
                    }).then(response => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Conjunto deletado com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    })
                }
            },
            store(){
                store.dispatch('classToolkit/store',{
                    rankId: $("select[name=ranks]").val(),
                    subRankId: $("select[name=sub_ranks]").val(),
                    subSubRankId: $("select[name=sub_sub_ranks]").val(),
                    toolId: this.tool
                }).then(response => {
                    new PNotify({
                        title: 'Aviso',
                        text: 'Conjunto adicionado com sucesso!',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                })
            }
        }
    }
</script>
