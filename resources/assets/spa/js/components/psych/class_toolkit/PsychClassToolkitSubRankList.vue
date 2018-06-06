<template>
    <div class="panel panel-default" >
        <div class="panel-heading">
            <h5 class="panel-title"> 
                <a data-toggle="collapse"  :href="`#collapse${index}`"  aria-expanded="false" class="collapsed">{{ classToolkit.sub_rank.name }}</a>
            </h5>
        </div>
		
        <div :id="`collapse${index}`" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
                <div class="tabs-container" v-if="classToolkit.sub_sub_rank">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" :href="`#tab-${index}`"> {{ classToolkit.sub_sub_rank.name }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div :id="`tab-${index}`" class="tab-pane active">
                            <div class="panel-body">
                                <div class="file-box">
                                    <div class="file">
                                        <a href="#">
                                            <span class="corner"></span>

                                            <div class="image">
                                                <img class="img-responsive" :src="`/storage/tool/${classToolkit.tool.image}`" alt="">
                                            </div>
                                            <div class="file-name">
                                                <h5>{{ classToolkit.tool.title }}</h5>
                                                <p class="cut">{{ classToolkit.tool.description }}</p>
                                                <small>{{ classToolkit.tool.year }}</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="file-box" v-else>
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img class="img-responsive" :src="`/storage/tool/${classToolkit.tool.image}`" alt="">
                            </div>
                            <div class="file-name">
                                <h5>{{ classToolkit.tool.title }}</h5>
                                <p class="cut">{{ classToolkit.tool.description }}</p>
                                <small>{{ classToolkit.tool.year }}</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
        props: ['classToolkit'],
        components:{
            'psych-class-toolkit-sub-sub-rank-list' : require('./PsychClassToolkitSubSubRankList.vue'),
            'psych-class-toolkit-frame' : require('./PsychClassToolkitFrame.vue')
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