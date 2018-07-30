@php
   $message='';
   foreach($errors->all() as $erro){
     $message.=$erro;
   }
@endphp
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('titulo','APC')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/meat.css')}}">
     <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AP</b>C</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>APC</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegacao</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              {{-- <li class="dropdown tasks-menu">
                <a href="{{ route('garcom.demanda') }}">
                  <i class="fa fa-cutlery"></i>
                  <span class="label label-danger">{{count(Session::get('itens2'))}}</span>
                </a>
              </li> --}}

             {{--  <li class="dropdown tasks-menu">
                @if(Session::has('itens'))

                  <a href="{{route('cozinha.demanda')}}">
                      <i class="fa fa-bell"></i>
                      <span class="label label-danger">{{count(Session::get('itens'))}}</span>
                  </a>

                  @else
                  <a href="{{route('cozinha.demanda')}}">
                    <i class="fa fa-bell"></i>
                    <span class="label label-danger">{{count(Session::get('itens'))}}</span>
                  </a>
                 @endif
              </li> --}}


              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-green">ONLINE-</small>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      Email: {{ Auth::user()->email }}
                      <small>Perfil: {{ Auth::user()->perfil->nome }}</small>
                      <a href="{{route('usuario.editar',['id'=>Auth::user()->user_id])}}" class="btn btn-default">
                        Editar Perfil
                      </a>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                                       
                      <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();
                        " 
                        class="btn btn-danger btn-flat">Sair
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li>
              <a href="{{ route('home') }}">
                <i class="fa fa-line-chart"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Registos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a href="{{route('categoria.cadastrar')}}"><i class="fa fa-circle-o"></i>Registar Tipo de Ajuda</a></li>
                <li><a href="{{route('padrinho.cadastrar')}}"><i class="fa fa-circle-o"></i>Registar Padrinho</a></li>
                <li><a href="{{route('crianca.cadastrar')}}"><i class="fa fa-circle-o"></i>Registar Crianca</a></li>
                <li><a href="{{route('categorias')}}"><i class="fa fa-circle-o"></i>Tipos de Ajuda</a></li>
                <li><a href="{{route('padrinhos')}}"><i class="fa fa-circle-o"></i>Padrinhos</a></li>
                <li><a href="{{route('criancas')}}"><i class="fa fa-circle-o"></i>Criancas</a></li>
              </ul>
            </li>
             
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Apadrinhamentos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('apadrinhamento')}}"><i class="fa fa-circle-o"></i>Atribuir padrinho</a></li>
                <li><a href="{{ route('lista_apadrinhamento')}}"><i class="fa fa-circle-o"></i>Criancas apadrinhadas</a></li>
              </ul>
            </li>


            


             {{-- <li class="treeview">
              <a href="#">
                <i class="fa fa-arrow-circle-right"></i>
                <span>Demandas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('cozinha.demanda')}}"><i class="fa fa-circle-o"></i>Demandas Cozinha</a></li>

                  <li><a href="{{route('garcom.demanda')}}"><i class="fa fa-circle-o"></i>Demandas Garcom</a></li>
              </ul>
             </li> --}}
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acesso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li><a href="{{route('usuario.cadastrar')}}"><i class="fa fa-circle-o"></i>Registar Utilizadores</a></li>
                <li><a href="{{route('usuarios')}}"><i class="fa fa-circle-o"></i>Utilizadores</a></li>
              </ul>
            </li>
             <li>
              <a href="{{route('ajuda')}}">
                <i class="fa fa-plus-square"></i> <span>Ajuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="{{route('sobre')}}">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          <!-- Dashboard -->
          <div class="container-fluid">
             @yield('dashboard')
          </div>


           <!-- Dashboard -->
          <div class="container-fluid">
             @yield('compra')
          </div>


           <div class="container-fluid">
             @yield('venda')
          </div>

          @if(!Request::is('admin','admin/pedido/venda')&&!Request::is('admin','admin/compras') && !Request::is('admin','admin/home') )
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h1 class="box-title text-primary">@yield('titulo_pagina')</h1>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('conteudo')
                              <!--Fin Contenido-->
                      </div>
                    </div>
                        
                </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
         @endif
        </section><!-- /.content -->


      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
     
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>versao</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018 <a href="www.rodrigues.developer.com">Dionisio Macamo</a>.</strong> Todos direitos reservados.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script>
      
      @if(Session::has('sucesso'))

        toastr.success("{{ Session::get('sucesso') }}")

      @endif

      @if(Session::has('info'))

        toastr.info("{{ Session::get('info') }}")

      @endif

      @if(count($errors)>0)
          toastr.error("{{ $message }}");
      @endif

      @if(Session::has('warning'))
          toastr.warning("{{ Session::get('warning')}}");
      @endif

    </script>
    
  </body>
</html>
