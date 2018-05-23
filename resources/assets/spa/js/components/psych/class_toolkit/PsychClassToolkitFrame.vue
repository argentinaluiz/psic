<template>
    <div class="file">
        <a href="#">
            <span class="corner"></span>

            <div class="image">
                <img class="img-responsive" src="" alt="">
            </div>
            <div class="file-name">
                <h5>Título</h5>
                <p class="cut">Descrição</p>
                <small>Ano</small>
            </div>
        </a>
    </div>
    <!-- 
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
    -->
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
            store.dispatch('psych/classToolkit/query');
        }
    }
</script>