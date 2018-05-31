<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Édipo</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Édipo</li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
			<div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Video</h5>
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
                            <figure>
                                <iframe width="600" height="450" src="http://www.youtube.com/embed/bwj2s_5e12U" frameborder="0" allowfullscreen></iframe>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Video Descrição</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content profile-content">
                           <h4><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit</strong></h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dol. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                <br>
                                <br>
                                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br> gadget after magical gadget.</small>
                                <br>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit "Lorem ipsum dolor sit amet, consectetur adipiscing elit". Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

@push('extra-js')
	<script type="text/javascript" src="{{asset('/js/plugins/video/responsible-video.js')}}"></script>

    <script>
        $(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function (e){
            $('body').hasClass('fullscreen-video') ? $('body').removeClass('fullscreen-video') : $('body').addClass('fullscreen-video')
        });
    </script>
@endpush

<script type="text/javascript">
    import store from '../../store/store';

    export default {
        
    }
</script>