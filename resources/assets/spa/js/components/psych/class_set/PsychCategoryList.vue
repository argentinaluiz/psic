<template>
    <div>
        <h5>Categorias</h5>
            <ul class="category-list" style="padding: 0">
                <li v-for="classSet in classSets"><a class="file-control" href="" >{{ classSet.category.name }}</a></li>
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