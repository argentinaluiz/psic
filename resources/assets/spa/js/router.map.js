/*Adicionamos a propriedade meta. Esta propriedade é um objeto que pode conter várias informações, porém só adicionamos uma propriedade auth com valor true.
A rota login não precisa ser protegida, então não adicionamos. À partir de agora devemos adicionar a propriedade meta em todas as rotas protegidas.*/

export default [
    /*{
        name: 'class_informations.list',
        path: '/classes',
        component: require('./components/psych/PsychClassInformationList.vue'),
        meta: {
            auth: true
        }
    },*/
    {
        path: '/psych',
        component: {
            template: '<router-view></router-view>'
        },
        children:[
            {
                name: 'psych.class_meetings.list',
                path: 'classes',
                component: require('./components/psych/PsychClassMeetingList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.class_tests.list',
                path: 'classes/:class_meeting/tests',
                component: require('./components/psych/class_test/PsychClassTestList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.class_tests.create_data',
                path: 'class_meetings/:class_meeting/tests/create_data',
                component: require('./components/psych/class_test/PsychClassTestStepData.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.class_tests.update_data',
                path: 'class_meetings/:class_meeting/tests/:class_test/update_data',
                component: require('./components/psych/class_test/PsychClassTestStepData.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.class_tests.questions',
                path: 'class_meetings/:class_meeting/tests/:class_test?/questions',
                component: require('./components/psych/class_test/PsychClassTestStepQuestions.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.researches.list',
                path: 'researches',
                component: require('./components/psych/research/PsychResearchList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.categories.list',
                path: 'categories',
                component: require('./components/psych/research/PsychCategoryList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.tools.list',
                path: 'tools',
                component: require('./components/psych/PsychToolList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.class_toolkits.list',
                path: 'class_toolkits',
                component: require('./components/psych/class_toolkit/PsychClassToolkitList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.dashboard',
                path: 'dashboard',
                component: require('./components/psych/PsychDashboard.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.treatment',
                path: 'treatment',
                component: require('./components/psych/PsychTreatment.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.equipment',
                path: 'equipment',
                component: require('./components/psych/PsychEquipment.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.oedipus',
                path: 'oedipus',
                component: require('./components/psych/PsychOedipus.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'psych.drug',
                path: 'drug',
                component: require('./components/psych/PsychDrug.vue'),
                meta: {
                    auth: true
                }
            },
        ]
    },
    {
        path: '/patient',
        component: {
            template: '<router-view></router-view>'
        },
        children: [
            {
                name: 'patient.test',
                path: 'test',
                component: {
                    template: '<div>Olá paciente</div>'
                },
            },
            {
                name: 'patient.class_informations.list',
                path: 'classes',
                component: require('./components/patient/PatientClassInformationList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'patient.class_meetings.list',
                path: 'classes/:class_information/meetings',
                component: require('./components/patient/PatientClassMeetingList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'patient.class_tests.list',
                path: 'classes/:class_information/meetings/:class_meeting/tests',
                component: require('./components/patient/class_test/PatientClassTestList.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'patient.class_tests.do',
                path: 'classes/:class_information/meetings/:class_meeting/tests/:class_test/do/:patient_class_test?',
                component: require('./components/patient/class_test/PatientClassTestDo.vue'),
                meta: {
                    auth: true
                }
            },
            {
                name: 'patient.chart.per_subject',
                path: 'classes/:class_information/meetings/:class_meeting/charts/per_subject',
                component: require('./components/patient/chart/PatientChartPerSubject.vue'),
                meta: {
                    auth: true
                }
            },
        ]
    },
    {
        name: 'login',
        path: '/login',
        component: require('./components/Login.vue')
    },
    { path: '*', redirect: '/login' }
];