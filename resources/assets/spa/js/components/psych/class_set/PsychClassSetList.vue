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
								
								<psych-category-list></psych-category-list>

								<div class="clearfix"></div>
								<div class="hr-line-dashed"></div>
								
								<psych-tag-list></psych-tag-list>
								
								<div class="clearfix"></div>
								<div class="hr-line-dashed"></div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-lg-9 animated fadeInRight">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="file-box" v-for="classSet in classSets">
								<div class="file">
									<a :href="`research/${classSet.research.url}`" target="_blank">
										<span class="corner"></span>
										
										<div class="image">
                                            <img class="img-responsive" :src="`/storage/research/${classSet.research.image}`" :alt="classSet.research.title">
										</div>
										<div class="file-name">
											<h5>{{ classSet.research.title }}</h5>
											<p class="cut">{{ classSet.research.description }}</p>
											<small>{{ classSet.research.year }}</small>
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
			'psych-tag-list' : require('./PsychTagList.vue')
		},
        computed: {
            classSets() {
                return store.state.psych.classSet.classSets;
            }
        },
        mounted() {
            store.dispatch('psych/classSet/query'); 
        }
    }
</script>