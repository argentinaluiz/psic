<template>    
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" :href="`#tab-${index}`"> {{ classToolkit.sub_sub_rank.name }}</a></li>
        </ul>
        <div class="tab-content">
            <div :id="`tab-${index}`" class="tab-pane active">
                <div class="panel-body">
                    <div class="file-box">
                        <template>
                            <psych-class-toolkit-frame></psych-class-toolkit-frame>	
                        </template>
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
            'psych-class-toolkit-frame' : require('./PsychClassToolkitFrame.vue')
        },
        computed: {
            classToolkit(){
                return this.$deepModel('psych.classToolkit.classToolkit');
            },
        },
        mounted() {
            store.dispatch('psych/classToolkit/query');
        }
    }
</script>