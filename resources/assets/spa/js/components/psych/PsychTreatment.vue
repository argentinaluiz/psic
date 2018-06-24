<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Tratamento</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Tratamento</li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Linhas de Tratamento</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        	<div class="ibox-content">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-stack-overflow"></i> Depressão </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
											<psych-depressao></psych-depressao>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-stack-overflow"></i> Neurose</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
											<psych-neurose></psych-neurose>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-stack-overflow"></i> Psiconeurose</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
											<psych-psiconeurose></psych-psiconeurose>
                                        </div>
                                    </div>
									<div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-stack-overflow"></i> Conversão/Histeria</a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse">
											<psych-conversao></psych-conversao>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
	import store from '../../store/store';

    export default {
		components:{
            'psych-depressao' : require('./treatment/PsychDepressao.vue'),
            'psych-neurose' : require('./treatment/PsychNeurose.vue'),
            'psych-psiconeurose' : require('./treatment/PsychPsiconeurose.vue'),
            'psych-conversao' : require('./treatment/PsychConversao.vue')
        }
        
    }
</script>