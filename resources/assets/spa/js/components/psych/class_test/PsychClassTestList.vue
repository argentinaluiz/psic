<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Geral</h2> 
            <ol class="breadcrumb">
                <li><router-link :to="{ name: 'psych.dashboard' }" >Home</router-link></li>
                <li><router-link :to="{ name: 'psych.class_meetings.list' }" >Listar categorias</router-link></li>
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
                                    <router-link :to="routeClassTestCreate" class="btn btn-sm btn-primary">
                                       <span class="glyphicon glyphicon-plus"></span> Nova questão
                                    </router-link>
                                    <div class="cleaner_h15"></div>
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Nome</th>
                                            <th>Início</th>
                                            <th>Fim</th>
                                            <th>Questões</th>
                                            <th>Pontos</th>
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
                                                <td>
                                                    <router-link :to="routeClassTestEdit(classTest.id)" class="btn btn-link">
                                                       <span class="glyphicon glyphicon-pencil"></span> Editar
                                                    </router-link> |
                                                    <a href="#" class="btn btn-link" @click.prevent="deleteClassTest(classTest)">
                                                       <span class="glyphicon glyphicon-trash"></span> Excluir
                                                    </a>
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

    export default {
        mixins:[classInformationMixin],
        computed: {
            storeType(){
                return 'psych';
            },
            classTests() {
                return store.state.psych.classTest.classTests;
            },
            routeClassTestCreate(){
                return {
                    name: 'psych.class_tests.create_data',
                    params: {
                        'class_meeting': this.$route.params.class_meeting
                    }
                }
            }
        },
        mounted() {
            let classMeetingId = this.$route.params.class_meeting;
            store.dispatch('psych/classMeeting/get',classMeetingId);
            store.dispatch('psych/classTest/query', classMeetingId);
        },
        methods:{
            routeClassTestEdit(classTestId){
                return{
                    name: 'psych.class_tests.update_data',
                    params:{
                        class_meeting: this.$route.params.class_meeting,
                        class_test: classTestId
                    }
                }
            },
            deleteClassTest(classTest){
                if(confirm('Deseja excluir esta avaliação?')){
                    store.dispatch('psych/classTest/delete', {
                        classMeetingId: this.$route.params.class_meeting,
                        classTestId: classTest.id
                    })
                }
            }
        }
    }
  
</script>
