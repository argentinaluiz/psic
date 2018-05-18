<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Geral</h2> 
             <ol class="breadcrumb">
                <li><router-link :to="{ name: 'psych.dashboard' }" >Home</router-link></li>
                <li><router-link :to="{ name: 'psych.class_meetings.list' }" >Listar categorias</router-link></li>
                <li><router-link :to="{ name: 'psych.class_tests.list' }" >Questões</router-link></li>
                <li class="active"><a href="">Adicionar questão</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Nova Questão de <small>{{classInformationName}}</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div  class="ibox-content">  
							<div class="alert alert-warning">
                                {{classTest.name}} | {{classTest.date_start}} à {{classTest.date_end}} | {{ classTest.selected }}
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-primary btn-block" @click="save"
                                    :disabled="!classTest.questions.length">Criar questão</button>
                                </div>
                                <div class="cleaner_h15"></div>
                            </div>
                            
                            <div class="row">
                                <template v-if="classTest.selected == 1">
                                    <div class="col-md-6">
                                        <psych-class-test-question-form></psych-class-test-question-form>
                                    </div>
                                    <div class="col-md-6">
                                        <psych-class-test-question-list></psych-class-test-question-list>
                                    </div>
                                </template>
                                <template v-if="classTest.selected == 2">
                                    <div class="col-md-6">
                                        <psych-class-test-question-multiple-form></psych-class-test-question-multiple-form>
                                    </div>
                                    <div class="col-md-6">
                                        <psych-class-test-question-multiple-list></psych-class-test-question-multiple-list>
                                    </div>
                                </template>
                                <template v-if="classTest.selected == 3">
                                    <div class="col-md-6">
                                        <psych-class-test-question-discursive-form></psych-class-test-question-discursive-form>
                                    </div>
                                    <div class="col-md-6">
                                        <psych-class-test-question-discursive-list></psych-class-test-question-discursive-list>
                                    </div>
                                </template>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';
    import classInformationMixin from '../../../mixins/class_information.mixin';

    export default {
        components:{
            'psych-class-test-question-form' : require('./PsychClassTestQuestionForm.vue'),
            'psych-class-test-question-list' : require('./PsychClassTestQuestionList.vue'),
            'psych-class-test-question-multiple-form' : require('./PsychClassTestQuestionMultipleForm.vue'),
            'psych-class-test-question-multiple-list' : require('./PsychClassTestQuestionList.vue'),
            'psych-class-test-question-discursive-form' : require('./PsychClassTestQuestionDiscursiveForm.vue'),
            'psych-class-test-question-discursive-list' : require('./PsychClassTestQuestionList.vue')
        },
        mixins:[classInformationMixin],
        computed: {
            storeType(){
                return 'psych';
            },
            classTest(){
                return this.$deepModel('psych.classTest.classTest');
            },
            

        },
        mounted() {
            store.dispatch('psych/classMeeting/get', this.$route.params.class_meeting);
            let classTestId = this.$route.params.class_test;
            if(typeof this.classTest.id =="undefined" && classTestId){
                let classMeetingId = this.$route.params.class_meeting;
                store.dispatch('psych/classTest/get',{
                    classMeetingId: classMeetingId,
                    classTestId: classTestId
                })
            }
        },
        methods: {
            save(){
                let classMeetingId = this.$route.params.class_meeting;
                let afterSave = () => {
                    new PNotify({
                        title: 'Informação',
                        text: 'Avaliação salva com sucesso',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                    this.$router.push({
                        name: 'psych.class_tests.list',
                        params: {
                            class_meeting: classMeetingId
                        }
                    });
                };
                let error = (responseError) => {
                    let messageError = 'Não foi possível realizar a operação! Tente novamente.';
                    switch (responseError.status){
                        case 422:
                            messageError = 'Informações inválidas! Verifique os dados da questão novamente.'
                            break;
                    }
                    new PNotify({
                        title: 'Mensagem de erro',
                        text: messageError,
                        styling: 'brighttheme',
                        type: 'error'
                    });
                };
                if(typeof this.classTest.id == "undefined"){
                    store.dispatch('psych/classTest/create',classMeetingId)
                        .then(afterSave,error);
                }else{
                    store.dispatch('psych/classTest/update',{
                        classMeetingId,
                        classTestId: this.classTest.id
                    })
                        .then(afterSave,error);
                }
            }
        }
    }
</script>