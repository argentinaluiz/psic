<template>
    <div>
        <h5 class="tag-title">Tags</h5>			
            <ul class="tag-list" style="padding: 0" v-for="classSet in classSets">
                <li><a href="">{{ classSet.research.tag }}</a></li>
            </ul>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
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