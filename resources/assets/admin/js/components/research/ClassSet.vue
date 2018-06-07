<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Selecionar psicanalista</label>
                    <select class="form-control" name="psychoanalysts"></select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Selecionar categoria</label>
                    <select class="form-control" name="categories"></select>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary" @click="store()">Adicionar</button>
        <br/><br/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Psicanalista</th>
                <th>Categoria</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="set in sets">
                <td>
                    <button type="button" class="btn btn-sm btn-link" @click="destroy(set)">
                        <span class="glyphicon glyphicon-trash"></span> Excluir
                    </button>
                </td>
                <td>{{ set.psychoanalyst.user.name}}</td>
                <td>{{ set.category.name}}</td>
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
        props: ['research'],
        computed: {
            sets(){
                return store.state.classSet.sets;
            }
        },
        mounted(){
            store.dispatch('classSet/query', this.research);
            let selects = [
                {
                    url: `${ADMIN_CONFIG.API_URL}/psychoanalysts`,
                    selector:"select[name=psychoanalysts]",
                    processResults(data){
                        return {
                            results: data.map((psychoanalyst) => {
                                return {id: psychoanalyst.id, text: psychoanalyst.user.name}
                            })
                        }
                    }
                },
                {
                    url: `${ADMIN_CONFIG.API_URL}/categories`,
                    selector:"select[name=categories]",
                    processResults(data){
                        return {
                            results: data.map((category) => {
                                return {id: category.id, text: category.name}
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
            destroy(set){
                if(confirm('Deseja remover este conjunto?')){
                    store.dispatch('classSet/destroy', {
                        setId: set.id,
                        researchId: this.research
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
                store.dispatch('classSet/store',{
                    psychoanalystId: $("select[name=psychoanalysts]").val(),
                    categoryId: $("select[name=categories]").val(),
                    researchId: this.research
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
