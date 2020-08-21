@extends('app')
@section('content')
    <div id="right-panel" class="right-panel">
         <!-- Header-->
         <header id="header" class="header">

<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        
    </div>

    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="{{url('/')}}/images/admin.jpg" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
                

                <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
        </div>

        <div class="language-select dropdown" id="language-select">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                <i class="flag-icon flag-icon-us"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="language">
                <div class="dropdown-item">
                    <span class="flag-icon flag-icon-fr"></span>
                </div>
                <div class="dropdown-item">
                    <i class="flag-icon flag-icon-es"></i>
                </div>
                <div class="dropdown-item">
                    <i class="flag-icon flag-icon-us"></i>
                </div>
                <div class="dropdown-item">
                    <i class="flag-icon flag-icon-it"></i>
                </div>
            </div>
        </div>

    </div>
</div>

</header><!-- /header -->
<!-- Header-->
      

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add New Product</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
               
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                   
                    <!--/.col-->

                

                                            <div class="col-lg-8 item-center">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Booking</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                                                       
                                                        <form action="{{url('/newsave')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                        {{ csrf_field() }}
                                                            
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Company</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="category" id="SelectLm" class="form-control-sm form-control">
                                                                           
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Company</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="category" id="SelectLm" class="form-control-sm form-control">
                                                                           
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                            
                                                        </form>

                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
                                               
                                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection

                                         

                                         
                                    
                                           
                                            

                                              

                                            
                          

