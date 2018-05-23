<template>
    <div class="ibox-title">
        <h5> Nome da Categoria <!-- {{ classToolkit.rank.name }} --></h5><!-- Aqui vai a categoria -->
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
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
            store.dispatch('psych/classToolkit/query');
        }
    }
</script>