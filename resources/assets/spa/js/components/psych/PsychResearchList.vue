<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="http://localhost:8000/home">Listar pesquisas</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Listagem de pesquisas</h5>
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
											<th>Título</th>
											<th>Imagem</th>
                                            <th>Descrição</th>
											<th>Ano</th>
										</tr>
										</thead>
										<tbody>
										 <tr v-for="research in researches">
                                            <td>{{research.title }}</td>
											<td>{{research.image }}</td>
											<td>{{research.description }}</td>
											<td>{{research.year }}</td>
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
            researches() {
                return store.state.psych.research.researches;
            }
        },
        mounted() {
            store.dispatch('psych/research/query'); 
        }
    }
</script>