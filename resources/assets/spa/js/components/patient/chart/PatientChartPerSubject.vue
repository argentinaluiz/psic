<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><router-link :to="{ name: 'patient.class_informations.list' }" >Listar classes</router-link></li>
                <li><router-link :to="{ name: 'patient.class_meetings.list' }" >Listar sessões</router-link></li>
                <li><router-link :to="{ name: 'patient.class_tests.list' }" >Questões</router-link></li>
                <li class="active"><a href="">Aproveitamento</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Definir Nome????
                            <small>{{classInformationName}}</small>
                            </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div  class="ibox-content">  
							<div class="row">
								<div id="chart"> </div>
							</div>
                            <div class="cleaner_h15"></div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import scriptjs from 'scriptjs';
    import store from '../../../store/store';
    import classInformationMixin from '../../../mixins/class_information.mixin';
    import {Patient} from '../../../services/resources';

    export default {
        mixins:[classInformationMixin],
        data(){
            return {
                data: []
            }
        },
        computed: {
            storeType(){
                return 'patient';
            },
        },
        mounted() {
            let classInformationId = this.$route.params.class_information;
            let classMeetingId = this.$route.params.class_meeting;
            store.dispatch('patient/classInformation/get', classInformationId);
            store.dispatch('patient/classMeeting/get', {classInformationId,classMeetingId})
                .then(this.getData)
                .then(data => {
                    if(data.length === 1){
                        return;
                    }
                    this.data = data;
                    this.initGoogleCharts();
                })
        },
        methods:{
            initGoogleCharts(){
                let self = this;
                scriptjs('https://www.gstatic.com/charts/loader.js', function(){
                    google.charts.load('current',{'packages': ['corechart']});
                    google.charts.setOnLoadCallback(self.drawChart)
                });
            },
            drawChart(){
                let options = {
                    title: `Aproveitamento da subcategoria ${this.classMeeting.subject.name}`,
                    curveType: 'function'
                };

                let chart = new google.visualization.LineChart(document.getElementById('chart'));
                chart.draw(google.visualization.arrayToDataTable(this.data),options);
            },
            getData(){
                let data = [
                    ["Data Avaliação","Aproveitamento"],
                ];
                return Patient.classTestResult.perSubject({class_meeting: this.classMeeting.id})
                    .then(response => {
                        for(let object of response.data){
                           // {created:, percentage:} -> ["",90]
                           // object.created_at = this.$options.filters.dateBr(object.created_at);
                            data.push(Object.values(object));
                        }
                        return data;
                    })
            }
        }
    }
</script>
