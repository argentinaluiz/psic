<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Geral</h2>
            <ol class="breadcrumb">
                <li><router-link :to="{ name: 'psych.dashboard' }" >Home</router-link></li>
                <li class="active">Listar recursos</li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
					<div class="col-sm-12">
						<div class="ibox float-e-margins" v-for="(classToolkit, key, index) in classToolkits" :key="index">
							<div class="ibox-title">
								<h5> {{ classToolkit.name }}</h5><!-- Aqui vai a categoria -->
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
								<div class="panel-body">
									<div class="panel-group">
										<div v-for="subRank in classToolkit.sub_ranks" class="panel panel-default">
											<div class="panel-heading">
												<h5 class="panel-title"> 
													<a data-toggle="collapse"  :href="`#collapse${subRank.id}`"  aria-expanded="false" class="collapsed">{{ subRank.name }}</a>
												</h5>
											</div>
											 <div :id="`collapse${subRank.id}`" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
												<div class="panel-body">
													<div  class="tabs-container" v-if="parent !== null">
														<ul  class="nav nav-tabs">
															<li><a data-toggle="tab" :href="`#tab-${index}`"> {{ subRank.name }}</a>  
															</li><!-- Aqui deveria ser o nome do parent -->
														</ul>	
                                                        <div class="tab-content">
                                                            <div :id="`tab-${index}`" class="tab-pane active">
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div v-for="toolkit in subRank.toolkits" class="file-box">
                                                                                <div  class="file">
                                                                                    <a href="#">
                                                                                        <span class="corner"></span>

                                                                                        <div class="image">
                                                                                            <img class="img-responsive" :src="`/storage/tool/${toolkit.tool.image}`" alt=""> 
                                                                                        </div>
                                                                                        <div class="file-name">
                                                                                            <h5>{{ toolkit.tool.title }}</h5>
                                                                                            <p class="cut">{{ toolkit.tool.description }}</p>
                                                                                            <small>{{ toolkit.tool.year }}</small>
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
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
               


                <!-- <div class="col-sm-12">
                    <ul>
                        <li v-for="classToolkit in classToolkits">
                            {{classToolkit.name}}
                            <ul>
                                <li v-for="subRank in classToolkit.subRanks">
                                    {{subRank.name}}
                                    <ul>
                                        <li v-for="subSubRank in subRank.subSubRanks">
                                            {{subSubRank.name}}
                                            <ul>
                                                <li v-for="tool in subSubRank.tools">
                                                    {{tool.title}}<br>
                                                    {{tool.image}}<br>
                                                    {{tool.description}}<br>
                                                    {{tool.year}}
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    -->

        </div>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';
    export default {
        data () {
            return {
            id: null
            }
        },
        /*components:{
            'psych-class-toolkit-rank-list' : require('./PsychClassToolkitRankList.vue'),
            'psych-class-toolkit-sub-rank-list' : require('./PsychClassToolkitSubRankList.vue')
        },*/
        props: ['classToolkit'],
        computed: {
            classToolkits() {
            console.log(store.state.psych.classToolkit.classToolkits);
               return store.state.psych.classToolkit.classToolkits;
               //console.log(classToolkits)
            }
        },
        mounted() {
            store.dispatch('psych/classToolkit/query');
            /*this.$http.get('psychoanalyst/class_toolkits').then((response) =>{
                //console.log ('success', response)
                this.class_toolkits = response.json().then ((data) => {
                    console.log(data)
                    this.class_toolkits = data
                })
                }, (response)=>{
                console.log ('error', response);
            })*/
        }
    }
</script>