<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><router-link :to="{ name: 'patient.class_informations.list' }" >Listar classes</router-link></li>
                <li><router-link :to="{ name: 'patient.class_meetings.list' }" >Listar sessões</router-link></li>
                <li class="active"><a href="">Questões</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Questões de
                                <small>{{classInformationName}}</small>
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
								<div class="col-md-12">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Nome</th>
                                            <th>Início</th>
                                            <th>Fim</th>
                                            <th>Questões</th>
                                            <th>Pontos</th>
                                            <th>Meus pontos</th>
                                            <th>Ações</th>
										</tr>
										</thead>
										<tbody>
                                             <tr v-for="classTest in classTests">
                                                <td>{{classTest.name}}</td>
                                                <td>{{classTest.date_start | dateTimeBr}}</td>
                                                <td>{{classTest.date_end | dateTimeBr}}</td>
                                                <td>{{classTest.total_questions}}</td>
                                                <td>{{classTest.total_points}}</td>
                                                <td v-if="classTest.patient_class_test">
                                                    {{classTest.patient_class_test.point}}
                                                </td>
                                                <td v-else></td>
                                                <td class="btn btn-link">
                                                    <template v-if="!classTest.patient_class_test && afterStart(classTest.date_start) && beforeEnd(classTest.date_end)">
                                                        <router-link :to="routeClassTestDo(classTest)">
                                                            Começar
                                                        </router-link>
                                                    </template>
                                                    <template v-if="classTest.patient_class_test && classTest.patient_class_test.point">
                                                        <router-link :to="routeClassTestDo(classTest)">
                                                            Ver
                                                        </router-link>
                                                    </template>
                                                    <template v-if="classTest.patient_class_test && !classTest.patient_class_test.point">
                                                        Em análise
                                                    </template>
                                                </td>
                                            </tr>
                                        </tbody>
									</table>
								</div> 
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
    import moment from 'moment';

    export default {
        mixins:[classInformationMixin],
        computed: {
            storeType(){
                return 'patient';
            },
            classTests() {
                return store.state.patient.classTest.classTests;
            }
        },
        mounted() {
            let classMeetingId = this.$route.params.class_meeting;
            let classInformationId = this.$route.params.class_information;
            store.dispatch('patient/classMeeting/get',{classInformationId, classMeetingId});
            store.dispatch('patient/classTest/query', classMeetingId);
        },
        methods:{
            afterStart(date) {
                let date1 = moment(date, moment.ISO_8601).toDate();
                return new Date().getTime() >= date1.getTime();
            },
            beforeEnd(date) {
                let date1 = moment(date, moment.ISO_8601).toDate();
                return new Date().getTime() <= date1.getTime();
            },
            routeClassTestDo(classTest){
                return{
                    name: 'patient.class_tests.do',
                    params: {
                        class_information: this.$route.params.class_information,
                        class_meeting:this.$route.params.class_meeting,
                        class_test: classTest.id,
                        patient_class_test: classTest.patient_class_test ? classTest.patient_class_test.id : null
                    }
                }
            }
        }
    }
</script>
