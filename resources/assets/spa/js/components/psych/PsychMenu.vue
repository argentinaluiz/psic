<template src="../templates/menu.html"></template>

<script type="text/javascript">
    import authMixin from '../../mixins/auth.mixin';
    import menuMixin from '../../mixins/menu.mixin';

    export default {
        mixins: [menuMixin],
        data(){
            return {
                menus:[
                    {name: "Categorias", routeName: 'psych.class_meetings.list' },
                    {name: "Pesquisas", routeName: 'psych.researches.list' }
                ],
                brandRouteName: 'psych.class_meetings.list'
            }
        }
    };
</script>