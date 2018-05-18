<template src="../templates/menu.html"></template>

<script type="text/javascript">
    import authMixin from '../../mixins/auth.mixin';
    import menuMixin from '../../mixins/menu.mixin';

    export default {
        mixins: [menuMixin],
        data(){
            return {
                menus:[
                    {name: "Classes", routeName: 'patient.class_informations.list' }
                ],
                brandRouteName: 'patient.class_informations.list'
            }
        }
    };
</script>