<template src="../templates/menu.html"></template>

<script type="text/javascript">
    import authMixin from '../../mixins/auth.mixin';
    import menuMixin from '../../mixins/menu.mixin';

    export default {
        mixins: [menuMixin],
        data(){
            return {
                menus:[
                    { name: "Dashboard", routeName: 'psych.dashboard' },
                    { name: "Perguntas", routeName: 'psych.class_meetings.list' },
                    { name: "Pesquisas", routeName: 'psych.researches.list' },
                    { name: "Recursos", routeName: 'psych.tools.list' },
                    { name: "Recursos ClassToolkit", routeName: 'psych.class_toolkits.list' },
                    { name: "Tratamento", routeName: 'psych.treatment' },
                    { name: "Aparelho Psíquico", routeName: 'psych.equipment' },
                    { name: "Édipo", routeName: 'psych.oedipus' },
                    { name: "Fármaco", routeName: 'psych.drug' }
                ],
                brandRouteName: 'psych.class_meetings.list'
            }
        }
    };
</script>