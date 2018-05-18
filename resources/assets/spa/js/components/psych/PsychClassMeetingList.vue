<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Geral</h2> 
             <ol class="breadcrumb">
                <li><router-link :to="{ name: 'psych.dashboard' }" >Home</router-link></li>
                <li class="active">Listar categorias</li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Listagem de categorias</h5>
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
											<th>Data Início</th>
											<th>Data Fim</th>
											<th>Categorias</th>
											<th>Subcategorias</th>
                                            <th>Fichas</th>
                                            <th>Subfichas</th>
                                            <th>Ações</th>
										</tr>
										</thead>
										<tbody>
										 <tr v-for="classMeeting in classMeetings">
											<td>{{classMeeting.class_information.date_start | dateBr}}</td>
											<td>{{classMeeting.class_information.date_end | dateBr}}</td>
											<td>{{classMeeting.class_information | classInformationAlias }}</td>
											<td>{{classMeeting.subject.name}}</td>
                                            <td>{{classMeeting.sheet.name}}</td>
                                            <td>{{classMeeting.sub_sheet.name}}</td>
											<td>
                                                <router-link class="btn btn-link" :to="{name: 'psych.class_tests.list', params: {class_meeting: classMeeting.id} }">
                                                   <span class="glyphicon glyphicon-list-alt"></span> Questões
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
        computed: {
            classMeetings() {
                return store.state.psych.classMeeting.classMeetings;
            }
        },
        mounted() {
            store.dispatch('psych/classMeeting/query');
        }
    }
</script>