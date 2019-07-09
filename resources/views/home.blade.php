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
                 

                    </div>

                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Admin</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Products</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>image</th>
                                            
                                            <th>QR</th>
                                            <th>name</th>
                                            <th>description</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($all_products != null)
                                        @foreach ($all_products as $route)
                                        <tr>
                                            <td>{{$route->_id}}<input type="hidden" value="{{$route->_id}}" id="cell_id"></td>
                                            <td class="product_image"><img src="{{url('/')}}/{{$route->image}}" width="40px"></td>
                                            <td class="product_qr"> {!! QrCode::size(40)->generate('http://1aadf0dd.ngrok.io/api/getProduct/'.$route->_id); !!}</td>
                                            <td>{{$route->name}}</td>
                                            <th>{{$route->description}}</th>
                                            <th>
                                                <style>
                                                    #action li{    list-style: none;}
                                                </style>
                                                <ul class="d-flex justify-content-center" id="action">
                                                    <li class="mr-3"><a href="{{ url('/edit-item/'.$route->_id)}}" class="text-secondary edit" ><i class="fa fa-edit"></i></a></li>
                                                    <li><a onclick="deleteitem({{$route->_id}})" class="text-danger" ><i class="ti-trash"></i></a></li>
                                                    
                                                </ul>
       
                                            </th>
                                        </tr>
                                        @endforeach  
                                        @endif  
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->



@endsection
    <!-- Right Panel -->


   