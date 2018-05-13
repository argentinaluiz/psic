<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="http://localhost:8000/home">Listar recursos</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Listagem de recursos</h5>
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
							<div class="panel-body">
                                <div class="panel-group" id="accordion"> <!-- Aqui vai a categoria-->
                                    <div class="panel panel-default" >
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><!-- Aqui vai a subcategoria-->
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">Collapsible Group Item #1</a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <!-- Se existir a sub da subcategoria
                                                 <div class="tabs-container">
													<ul class="nav nav-tabs">
														<li class="active"><a data-toggle="tab" href="#tab-1"> This is tab</a></li>
														<li class=""><a data-toggle="tab" href="#tab-2">This is second tab</a></li>
													</ul>
													<div class="tab-content">
														<div id="tab-1" class="tab-pane active">
															<div class="panel-body">
																<strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

																<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
																	existence in this spot, which was created for the bliss of souls like mine.</p>

																<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at
																	the present moment; and yet I feel that I never was a greater artist than now. When.</p>
															</div>
														</div>
														<div id="tab-2" class="tab-pane">
															<div class="panel-body">
																<strong>Donec quam felis</strong>

																<p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
																	and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

																<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
																	sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
															</div>
														</div>
													</div>
												</div>
                                                -->
                                                <div class="file-box" v-for="tool in tools">
                                                    <div class="file">
                                                        <a href="#">
                                                            <span class="corner"></span>

                                                            <div class="image">
                                                                <img class="img-responsive" src="" alt="" style="max-width: 50px;">
                                                                {{ tool.image }}
                                                            </div>
                                                            <div class="file-name">
                                                                {{ tool.title }}
                                                                {{ tool.description }}
                                                                <br/>
                                                                <small>{{ tool.year }}</small>
                                                            </div>
                                                        </a>
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
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import store from '../../store/store';

    export default {
        computed: {
            tools() {
                return store.state.psych.tool.tools;
            }
        },
        mounted() {
            store.dispatch('psych/tool/query'); 
        }
    }
</script>