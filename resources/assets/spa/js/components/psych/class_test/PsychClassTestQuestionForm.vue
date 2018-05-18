<template>
    <form class="form-horizontal" @submit.prevent="addQuestion">
        <div class="form-group">
            <label for="question" class="col-sm-2 control-label">Questão</label>
            <div class="col-sm-6">
                <textarea  name="question" id="question" class="form-control" v-model="question.question" > </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="point" class="col-sm-2 control-label">Pontos</label>
            <div class="col-sm-6"><input  id="point" name="point" class="form-control" v-model="question.point"></div>
        </div>
        <button type="button" class="btn btn-primary" @click="addChoice">
            <span class="glyphicon glyphicon-plus"></span> Nova alternativa
        </button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th style="width: 10px">Verd.?</th>
                    <th>Alternativa</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(choice,index) in question.choices">
                    <td>
                        <a class="btn btn-warning btn-sm" href="#" @click.prevent="deleteChoice(index)">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td>
                         <input type="radio" name="choice_true" v-model="choice['true']" value="true" @click="uncheck(choice)">
                    </td>
                    <td>
                        <textarea class="form-control" v-model="choice.choice"></textarea>
                    </td>
                </tr>
            </tbody>

        </table>
        <button class="btn btn-sm btn-primary btn-block">Adicionar</button>
    </form>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
        computed: {
            question(){
                return this.$deepModel('psych.classTest.question')
            }
        },
        mounted() {
           
        },
        methods: {
            addQuestion() {
                store.commit('psych/classTest/addQuestion');
            },
            addChoice(){
                store.commit('psych/classTest/addChoice');
            },
            deleteChoice(index){
                store.commit('psych/classTest/deleteChoice',index);
            },
            uncheck(choice){
               store.commit('psych/classTest/setChoiceTrue',choice);
            }
        }
    }
</script>