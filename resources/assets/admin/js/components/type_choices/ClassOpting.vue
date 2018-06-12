<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Selecionar alternativa da questão</label>
                    <select class="form-control" name="question_choices"></select>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary" @click="store()">Adicionar</button>
        <br/><br/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Alternativa da questão</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="opting in optings">
                <td>
                    <button type="button" class="btn btn-sm btn-link" @click="destroy(opting)">
                        <span class="glyphicon glyphicon-trash"></span> Excluir
                    </button>
                </td>
                <td>{{opting.question_choice.choice}}</td>
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
        props: ['typeChoice'],
        computed: {
            optings(){
                return store.state.classOpting.optings;
            }
        },
        mounted(){
            store.dispatch('classOpting/query', this.typeChoice);
            let selects = [
                {
                    url: `${ADMIN_CONFIG.API_URL}/question_choices`,
                    selector:"select[name=question_choices]",
                    processResults(data){
                        return {
                            results: data.map((question_choice) => {
                                return {id: question_choice.id, text: question_choice.choice}
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
            destroy(opting){
                if(confirm('Deseja remover esta alternativa?')){
                   store.dispatch('classOpting/destroy', {
                        optingId: opting.id,
                        typeChoiceId: this.typeChoice
                    }).then(response => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Alternativa deletada com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    })
                }
            },
            store(){
                store.dispatch('classOpting/store',{
                    questionChoiceId: $("select[name=question_choices]").val(),
                    typeChoiceId: this.typeChoice
                }).then(response => {
                    new PNotify({
                        title: 'Aviso',
                        text: 'Alternativa da questão adicionada com sucesso!',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                })
            }
        }
    }
</script>
