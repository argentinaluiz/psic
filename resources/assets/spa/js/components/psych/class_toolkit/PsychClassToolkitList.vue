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
                    <div class="ibox float-e-margins" v-for="(classToolkit, index) in classToolkits" :key="index">
                        <template>
							<psych-class-toolkit-rank-list></psych-class-toolkit-rank-list>	
						</template>
                        <div  class="ibox-content">  
							<div class="panel-body">
                                <div class="panel-group">
									<template>
										<psych-class-toolkit-sub-rank-list></psych-class-toolkit-sub-rank-list>	
									</template>
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
            'psych-class-toolkit-rank-list' : require('./PsychClassToolkitRankList.vue'),
            'psych-class-toolkit-sub-rank-list' : require('./PsychClassToolkitSubRankList.vue')
        },
        computed: {
            classToolkits() {
                return store.state.psych.classToolkit.classToolkits;
            }
        },
        mounted() {
            store.dispatch('psych/classToolkit/query'); 
        }
    }
</script>