<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="http://localhost:8000/home">Listar pesquisas</a></li>
            </ol>
        </div>
		
		<div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							<div class="file-manager">
								<h5>Categorias</h5>
								<a  href="#" class="file-control active">Todos</a>
								<a href="#" class="file-control" >Documentos</a>
								<a href="#" class="file-control">Audios</a>
								<div class="hr-line-dashed"></div>
								
								<h5 class="tag-title">Tags</h5>
								<ul class="tag-list" style="padding: 0" v-for="research in researches">
									<li><a href="">{{ research.tag }}</a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-lg-9 animated fadeInRight">
					<div class="row">
						<div class="col-lg-12">
							<div class="file-box" v-for="research in researches">
								<div class="file">
									<a href="#">
										<span class="corner"></span>
										
										<div class="image">
                                            <img class="img-responsive" :src="`/storage/research/${research.image}`" alt="">
										</div>
										<div class="file-name">
											<h5>{{ research.title }}</h5>
											<p class="cut">{{ research.description }}</p>
											<small>{{ research.year }}</small>
										</div>
									</a>
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