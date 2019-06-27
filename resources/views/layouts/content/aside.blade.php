<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Navecion Principal</li>

            <li ><a href="{{ url('/home') }}"><i  ></i>Home</a></li>

                
            <li class="active treeview">               
                <a href="#">
                        <i class="fa fa-users"></i> <span>Administrar Usuario</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                @permission('permission_admin')        
                    <li ><a href="{{ route('users.index') }}"><i class="fa fa-user"></i>Lista de Usuarios</a></li>
                    <li ><a href="{{ route('roles.index') }}"><i class="fa fa-briefcase"></i>Administrar Grupos</a></li>
                    <li ><a href="{{ route('permissions.index') }}"><i class="fa fa-briefcase"></i>Administrar Permisos</a></li>
                @endpermission
                    <li ><a href="{{ route('perfiles.index') }}"><i class="fa fa-briefcase"></i>Perfil de Usuario</a></li>
                </ul>
            </li>
            
            
            @permission('permission_admin') 
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> <span>Seguridad y reportes</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('backup.index') }}"><i class="fa fa-circle-o"></i> Adm. Back up</a></li>                    
                    <li ><a href="{{ route('bitacoras.index') }}"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                </ul>            
            </li>
            @endpermission

            
            @permission('realizar_parametrizacion') 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> <span>Parametrizacion</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li ><a href="{{ route('categorias.index') }}"><i class="fa fa-circle-o"></i>Categoria</a></li>
                   <li ><a href="{{ route('marcas.index') }}"><i class="fa fa-circle-o"></i>Marca</a></li>
                   <li ><a href="{{ route('medidas.index') }}"><i class="fa fa-circle-o"></i>Medida</a></li>
                   <li ><a href="{{ route('productos.index') }}"><i class="fa fa-circle-o"></i>Producto</a></li>
                   <li ><a href="{{ route('ofertas.index') }}"><i class="fa fa-circle-o"></i>Oferta</a></li>
                </ul>            
            </li>
            @endpermission
             @permission('realizar_compras') 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-cart-plus"></i><span>Compras</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                   <li ><a href="{{ route('productos.index') }}"><i class="fa fa-circle-o"></i>Producto</a></li>
                   <li ><a href="{{ route('carts.index') }}"><i class="fa fa-circle-o"></i>Carrito</a></li>
                   <li ><a href="{{ route('carts.indexB') }}"><i class="fa fa-circle-o"></i>Mis Carritos</a></li>
                   <li ><a href="{{ route('calificaciones.index') }}"><i class="fa fa-circle-o"></i>Top 5</a></li>
                </ul>            
            </li>
            @endpermission
            @permission('realizar_entregas') 
            <li class="treeview">
                <a href="#">
                   <i class="fa fa-fw fa-bus"></i> <span>Entregas</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li ><a href="{{ route('entregas.index') }}"><i class="fa fa-circle-o"></i>Entrega</a></li>
                   <li ><a href="{{ route('entregas.indexB') }}"><i class="fa fa-circle-o"></i>Mis Entregas</a></li>
                </ul>            
            </li>

              @endpermission

            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>