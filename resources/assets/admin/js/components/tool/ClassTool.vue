<template>
    <div>
        <div class="form-group">
            <label class="control-label">Selecionar psicanalista</label>
            <select class="form-control" name="psychoanalysts"></select>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="psychoanalyst in psychoanalysts">
                    <td>
                        <button type="button" class="btn btn-sm btn-link" @click="destroy(psychoanalyst)">
                            <span class="glyphicon glyphicon-trash"></span> Excluir
                        </button>
                    </td>
                    <td>{{psychoanalyst.user.name}}</td>
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
        props: ['tool'], //para passar o id da Classe
        computed: {
            psychoanalysts(){
                return store.state.classTool.psychoanalysts;
            }
        },
        mounted(){ //invoca a action classTool/query, que busca os dados através de uma requisição Ajax e alimenta os dados de psicanalistas para que seja listado no componente
            store.dispatch('classTool/query', this.tool); //passo o módulo e depois a ação que desejo chamar
            $("select[name=psychoanalysts]").select2({
                ajax: {
                    url: `${ADMIN_CONFIG.API_URL}/psychoanalysts`,
                    dataType: 'json',
                    delay: 250,
                    data(params){
                        return {
                            q: params.term
                        }
                    },
                    processResults(data){
                        return {
                            //Com o método map eu posso alterar a posição de qualquer elemento dentro do array, isto quer dizer que, o método map percorre toda coleção e retorna apenas os campos que informamos na função
                            results: data.map((psychoanalyst) => {
                                return {id: psychoanalyst.id, text: psychoanalyst.user.name}
                            })
                        }
                    }
                },
                minimumInputLength: 1,
            });
            let self = this;
                $("select[name=psychoanalysts]").on('select2:select', event => {
                    store.dispatch('classTool/store', {
                        psychoanalystId: event.params.data.id,
                        toolId: self.tool
                    }).then(() => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Psicanalista adicionado com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    });
                })
            },
            methods: {
                destroy(psychoanalyst){
                    if(confirm('Deseja remover este psicanalista?')){
                        store.dispatch('classTool/destroy', {
                            psychoanalystId: psychoanalyst.id,
                            toolId: this.tool
                        }).then(() => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Psicanalista deletado com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    });
                    }
                }
            }
        }
</script>

