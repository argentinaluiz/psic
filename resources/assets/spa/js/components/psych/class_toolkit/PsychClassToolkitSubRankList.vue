<template>
    <div v-for="subRank in rank.subRanks" class="panel panel-default" >
        <div class="panel-heading">
            <h5 class="panel-title"> 
                <a data-toggle="collapse"  :href="`#collapse${id}`"  aria-expanded="false" class="collapsed">{{ subRanks.name }}</a>
            </h5>
        </div>
		
        <div :id="`collapse${id}`" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
                <div class="tabs-container" v-if="subRanks">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" :href="`#tab-${id}`"> {{ subRanks.name }}</a></li>
                    </ul>
                    <template>
                        <psych-class-toolkit-sub-sub-rank-tab></psych-class-toolkit-sub-sub-rank-tab>	
                    </template>
                </div>
                <div class="file-box" v-else>
                    <template>
                        <psych-class-toolkit-frame></psych-class-toolkit-frame>	
                    </template>
                </div>
            </div>
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
        components:{
            'psych-class-toolkit-sub-sub-rank-list' : require('./PsychClassToolkitSubSubRankList.vue'),
            'psych-class-toolkit-sub-sub-rank-tab' : require('./PsychClassToolkitSubSubRankTab.vue'),
            'psych-class-toolkit-frame' : require('./PsychClassToolkitFrame.vue')
        },
        props: ['classToolkit'],
        computed: {
            classToolkits() {
                return store.state.psych.classToolkit.classToolkits;
            }
        },
        mounted() {
           // store.dispatch('psych/classToolkit/query');
            this.id = this._uid;
        }
    }
</script>