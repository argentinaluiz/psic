<template>
    <div>
        <h5>Categorias</h5>
        <ul class="category-list" style="padding: 0">
            <li v-for="category in categories"><a class="file-control" href="" >{{ category.name }}</a></li>
        </ul>							
    </div>
</template>

<script type="text/javascript">
	import store from '../../../store/store';

    export default {
        computed: {
            storeType(){
                return 'psych';
            },
            categories() {
                return store.state.psych.category.categories;
			}
        },
        mounted() {
			store.dispatch('psych/category/query');
        }
    }
</script>