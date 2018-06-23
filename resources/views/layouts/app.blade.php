<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Psicanalysis - @yield('pag_title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/themeStyle.css') }}" rel="stylesheet">

	@stack('extra-css')

</head>
<body id="admin">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				 <ul class="nav metismenu" id="side-menu">
					<li class="nav-header">
						<div class="dropdown profile-element"> <span>
							<img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg')}} " />
							 </span>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="clear"> <span class="block m-t-xs cut"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
							 </span> <span class="text-muted text-xs block">administrador <b class="caret"></b></span> </span> </a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="{{ route('site.perfil')}}">Perfil</a></li>
								<li><a href="">Mudar Senha</a></li>
								<li><a href="">Email</a></li>
								<li>
									<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										 {{trans('auth.logout')}}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</div>
						<div class="logo-element">
							PSIC
						</div>
					</li>
					<li class="active">
						<a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Geral</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="">Contatos</a></li>
							<li><a href="">Tarefas</a></li>
							<li><a href="">Observações</a></li>
							<li><a href="">Mensagens</a></li>
							<li><a href="">Email </a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-question"></i> <span class="nav-label">Perguntas</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('class_informations.index') }}">Categorias</a></li>
							<li><a href="{{ route('subjects.index') }}">Subcategorias</a></li>
							<li><a href="{{ route('sheets.index') }}">Fichas</a></li>
							<li><a href="{{ route('sub_sheets.index') }}">Subfichas</a></li>
							<li><a href="{{ route('type_choices.index') }}">Tipos de Alternativas</a></li>
							<li><a href="{{ route('list_choices.index') }}">Alternativas</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-comments-o"></i> <span class="nav-label">Consultas</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="consultas.html">Dados Gerais</a></li>
							<li><a href="">Queixas</a></li>
							<li><a href="">Sintomas</a></li>
							<li><a href="">Observação Corporal</a></li>
							<li><a href="">Perguntas</a></li>
							<li><a href="">Recursos</a></li>
							<li><a href="">OBS</a></li>
							<li><a href="">Hipótese Diagnóstica</a></li>
							<li><a href="">Plano de Procedimentos</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-pie-chart"></i> <span class="nav-label">Pesquisas</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('researches.index') }}"> Pesquisas </a></li>
							<li><a href="{{ route('categories.index') }}"> Categorias</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-comments-o"></i> <span class="nav-label">Recursos</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('tools.index') }}"> Recursos </a></li>
							<li><a href="{{ route('ranks.index') }}"> Categorias</a></li>
							<li><a href="{{ route('sub_ranks.index') }}"> Subcategorias</a></li>
							<li><a href="{{ route('sub_sub_ranks.index') }}"> Sub_Subcategorias</a></li>
						</ul>
					</li>

					<li>
						<a href=""><i class="fa fa-qrcode"></i> <span class="nav-label">Produtos</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('products.index') }}"> Produtos </a></li>
							<li><a href="{{ route('site.favorites') }}"> Favoritos </a></li>
						</ul>
					</li>

					<li>
						<a href=""><i class="fa fa-book"></i> <span class="nav-label">Bibliotecas</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('imagens.index') }}"> Imagens </a></li>
							<li><a href="{{ route('documents.index') }}"> Documentos </a></li>
						</ul>
					</li>

					<li>
						<a href="{{ route('slides.index') }}"><i class="fa fa-sliders"></i> <span class="nav-label">Slides</span></a>
					</li>
					
					<li>
						<a href=""><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Relatórios</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href=""> Pacientes</a> </li>
							<li><a href=""> Psicanalistas</a></li>
							<li><a href=""> Supervisão</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-envelope"></i> <span class="nav-label">Emails </span><span class="label label-warning pull-right">12/26</span></a>
						<ul class="nav nav-second-level collapse">
								<li><a href="">Caixa de entrada</a></li>
								<li><a href="">Ver email</a></li>
								<li><a href="">Escrever email</a></li>
								<li><a href="">Modelos de email</a></li>
						 </ul>
					</li>
					<li>
						<a href=""><i class="fa fa-flask"></i> <span class="nav-label">Supervisão</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Aplicações</span>  <span class="pull-right label label-primary">ESPECIAL</span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="">Blog</a></li>
							<li><a href="">Chat</a></li>
							<li><a href="">Aparelho psíquico</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configurações</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('users.index') }}">Usuários</a></li>
							<li><a href="{{ route('roles.index') }}">Papéis</a></li>
							<li><a href="{{ route('site.perfil') }}">Perfil</a></li>
							<li><a href="{{ route('site.orders') }}">Ordens</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>  

        <div id="page-wrapper" class="gray-bg">
			@include('partials.nav-painel')

			<div class="row wrapper border-bottom white-bg page-heading">
				@yield('breadcrumb')
			</div>

		   <div class="wrapper wrapper-content  animated fadeInRight">
				<div class="row">
					<div class="col-sm-12">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								@yield('h5-title')
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
								@include('partials.message')                       
								<div class="row">
									<div class="col-md-12">
										@yield('content')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            @include('partials.footer-painel')
        </div>
    </div>
	<!-- Script -->
	<script src="{{ asset('js/admin.js') }} "></script>

    <!-- Plugins -->
    <script src="{{ asset('js/plugins.js') }} "></script>

    <!-- Custom and plugin javascript -->
   	<script src="{{ asset('js/atendimento.js') }} "></script>
	
   	@stack('extra-js')
</body>
</html>
