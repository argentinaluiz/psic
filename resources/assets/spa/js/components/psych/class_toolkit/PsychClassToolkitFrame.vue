<template>
    <div class="file">
        <a href="#">
            <span class="corner"></span>

            <div class="image">
                <img class="img-responsive" :src="`/storage/tool/${classToolkit.subRanks.subSubRanks.tools.image}`" alt=""> 
            </div>
            <div class="file-name">
                <h5>{{ classToolkit.subRanks.subSubRanks.tools.title }}</h5>
                <p class="cut">{{ classToolkit.subRanks.subSubRanks.tools.description }}</p>
                <small>{{ classToolkit.subRanks.subSubRanks.tools.year }}</small>
            </div>
        </a>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
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