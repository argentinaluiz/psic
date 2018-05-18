<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active"><a href="">Listar sessões</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Listagem de classes</h5>
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
                                            <th>Categoria</th>
											<th>Ações</th>
										</tr>
										</thead>
										<tbody>
										 <tr v-for="classInformation in classInformations">
											<td>{{classInformation.date_start | dateBr }}</td>
											<td>{{classInformation.date_end | dateBr }}</td>
                                            <td>{{classInformation | classInformationAlias }}</td>
											<td>
                                                <router-link :to="{name: 'patient.class_meetings.list', params: {class_information: classInformation.id} }" class="btn btn-link">
                                                    Sessões
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
            classInformations() {
                return store.state.patient.classInformation.classInformations;
            }
        },
        mounted() {
            store.dispatch('patient/classInformation/query');
        }
    }
</script>