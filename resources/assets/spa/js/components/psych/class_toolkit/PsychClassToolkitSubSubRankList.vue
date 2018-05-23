<template>
    <div class="panel-body">
        <template>
            <psych-class-toolkit-sub-sub-rank-tab></psych-class-toolkit-sub-sub-rank-tab>
        </template>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
         components:{
            'psych-class-toolkit-sub-sub-rank-tab' : require('./PsychClassToolkitSubSubRankTab.vue')
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