<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><router-link :to="{ name: 'patient.class_informations.list' }" >Listar classes</router-link></li>
                <li><router-link :to="{ name: 'patient.class_meetings.list' }" >Listar sessões</router-link></li>
                <li><router-link :to="{ name: 'patient.class_tests.list' }" >Questões</router-link></li>
                <li class="active"><a href="">Fazendo teste</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Questões
                            </h5>
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
							<div class="row">
								<div class="col-md-3">
                                    <strong>Classe:</strong> {{classInformationName}}
                                    <br/>
                                    <strong>Pontos:</strong> {{classTestPoints}}
                                    <br/>
                                    <strong>Início:</strong> {{classTestDateStart}}
                                    <br/>
                                    <strong>Fim:</strong>     {{classTestDateEnd}}
                                    <div class="cleaner_h10"></div>
                                    <button class="btn btn-sm btn-primary btn-block" @click="save"
                                            v-if="!patientClassTest.id">Salvar</button>
								</div>
                                <div class="col-md-9" v-if="classTest">
									<ol class="nav nav-pills">
                                        <li v-for="(question,index) in classTest.questions">
                                            <a href="#" @click.prevent="setQuestion(question)">
                                                <span class="label" :class="defineColorQuestion(question)">
                                                    Quest. #{{index+1}}
                                                </span>
                                            </a>
                                        </li>
                                    </ol>
								</div>
							</div>
                            <div class="cleaner_h15"></div>
                            <div class="row">
                                <patient-class-test-question></patient-class-test-question>
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
            'patient-class-test-question': require('./PatientClassTestQuestion.vue')
        },
        mixins:[classInformationMixin],
        computed: {
            storeType(){
                return 'patient';
            },
            classTest() {
                return store.state.patient.classTest.classTest;
            },
            classTestPoints() {
                let classTest = this.classTest;
                return classTest ? classTest.total_points : 0;
            },
            classTestDateStart() {
                let classTest = this.classTest;
                return classTest ? this.$options.filters.dateTimeBr(classTest.date_start) : '';
            },
            classTestDateEnd() {
                let classTest = this.classTest;
                return classTest ? this.$options.filters.dateTimeBr(classTest.date_end) : '';
            },
            patientClassTest() {
                return store.state.patient.patientClassTest.patientClassTest;
            },
            choices(){
                return this.patientClassTest.choices;
            }
        },
        mounted() {
            let classMeetingId = this.$route.params.class_meeting;
            let classInformationId = this.$route.params.class_information;
            let classTestId = this.$route.params.class_test;
            let patientClassTestId = this.$route.params.patient_class_test;
            store.dispatch('patient/classMeeting/get',{classInformationId, classMeetingId});
            store.dispatch('patient/classTest/get', {classMeetingId,classTestId})
                .then(() => {
                    let question = this.classTest.questions[0];
                    store.commit('patient/classTest/setQuestion',question);
                });
            if(patientClassTestId){
                store.dispatch('patient/patientClassTest/get',{classTestId,patientClassTestId});
            }
        },
        methods:{
            setQuestion(question){
                store.commit('patient/classTest/setQuestion',question);
            },
            defineColorQuestion(question){
                return{
                    'label-default': !this.choices.hasOwnProperty(question.id),
                    'label-primary': this.choices.hasOwnProperty(question.id),
                    'label-success': store.getters['patient/classTest/isTrue'](question,this.choices[question.id]),
                    'label-danger': this.patientClassTest.id && !store.getters['patient/classTest/isTrue'](question,this.choices[question.id])
                }
            },
           save() {
                let classMeetingId = this.$route.params.class_meeting;
                let classInformationId = this.$route.params.class_information;
                let afterSave = () => {
                    new PNotify({
                        title: 'Informação',
                        text: 'Questão salva com sucesso',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                    this.$router.push({
                        name: 'patient.class_tests.list',
                        params: {
                            class_information: classInformationId,
                            class_meeting: classMeetingId,
                        }
                    });
                };
                let error = (responseError) => {
                    let messageError = 'Não foi possível realizar a operação! Tente novamente.';
                    switch (responseError.status) {
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
                store.dispatch('patient/patientClassTest/create', this.$route.params.class_test)
                    .then(afterSave, error);
            }

        }
    }
</script>

<style type="text/css" scoped>
    .nav > li > a {padding: 0px;}
</style>