<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Geral</h2> 
            <ol class="breadcrumb">
                <li><router-link :to="{ name: 'psych.dashboard' }" >Home</router-link></li>
                <li class="active">Listar pesquisas</li>
            </ol>
        </div>
		
		<div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							<div class="file-manager">
								<template>
									<psych-category-list></psych-category-list>
								</template>
								<div class="clearfix"></div>
								<div class="hr-line-dashed"></div>
								
								<h5 class="tag-title">Tags</h5>
								<ul class="tag-list" style="padding: 0" v-for="research in researches">
									<li><a href="">{{ research.tag }}</a></li>
								</ul>
								<div class="clearfix"></div>
								<div class="hr-line-dashed"></div>
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
                                            <img class="img-responsive" :src="`/storage/research/${research.image}`" :alt="research.title">
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
	import store from '../../../store/store';

    export default {
		components:{
			'psych-category-list' : require('./PsychCategoryList.vue'),
        },
        computed: {
			storeType(){
                return 'psych';
            },
            researches() {
                return store.state.psych.research.researches;
			}
        },
        mounted() {
			store.dispatch('psych/research/query');
        }
    }
</script>