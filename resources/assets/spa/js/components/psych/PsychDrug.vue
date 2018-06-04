<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Fármaco</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Fármaco</li>
            </ol>
        </div>
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
				<div class="col-lg-12 text-center">
                    <iframe id="drug" style="border:1px solid #2F4050" title="Breve guia dos Psicofármacos" :src="`/storage/psicofarmacos.pdf`" frameborder="1" scrolling="auto" height="1100" width="850" ></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import store from '../../store/store';

    export default {
        
    }
</script>