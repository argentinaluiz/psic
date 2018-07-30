<template>
    <div v-for="tool in subSubRank.tools" class="file">
        <a href="#">
            <span class="corner"></span>

            <div class="image">
                <img class="img-responsive" :src="`/storage/tool/${tools.image}`" alt=""> 
            </div>
            <div class="file-name">
                <h5>{{ tools.title }}</h5>
                <p class="cut">{{ tools.description }}</p>
                <small>{{ tools.year }}</small>
            </div>
        </a>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
        props: ['classToolkit'],
        computed: {
            classToolkits() {
                return store.state.psych.classToolkit.classToolkits;
            }
        },
        mounted() {
           // store.dispatch('psych/classToolkit/query');
        }
    }
</script>