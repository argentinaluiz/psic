<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><router-link :to="{ name: 'patient.class_informations.list' }" >Listar classes</router-link></li>
                <li class="active"><a href="">Listar sessões</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Questões de  <small v-if="classInformation">{{classInformation | classInformationAlias}}</small>
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
											<th>Sessões</th>
                                            <th>Ações</th>
										</tr>
										</thead>
										<tbody>
										 <tr v-for="classMeeting in classMeetings">
											<td>{{classMeeting.subject.name}}</td>
											<td>
                                                <router-link class="btn btn-link" :to="{name: 'patient.class_tests.list', params: {class_meeting: classMeeting.id} }">
                                                   <span class="glyphicon glyphicon-list-alt"></span> Questões
                                                </router-link>|
                                                <router-link class="btn btn-link" :to="{name: 'patient.chart.per_subject', params: {class_meeting: classMeeting.id} }">
                                                    <span class="glyphicon glyphicon-signal"></span> Aproveitamento
                                                </router-link>
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
    import store from '../../store/store';

    export default {
        computed: {//não aceita params
            classMeetings() {
                return store.state.patient.classMeeting.classMeetings;
            },
            classInformation(){
                return store.state.patient.classInformation.classInformation;
            }
        },
        mounted() {
            let classInformationId = this.$route.params.class_information;
            store.dispatch('patient/classInformation/get',classInformationId);
            store.dispatch('patient/classMeeting/query',classInformationId );
        },
        methods:{
            routeClassTestList(classMeeting){
                return{
                    name: 'patient.class_tests.list', 
                    params:{
                        class_information: this.$route.params.class_information,
                        class_meeting: classMeeting.id,
                    }
                }
            }
        }
    }
</script>