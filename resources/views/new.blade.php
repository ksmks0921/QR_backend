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
                                                        <strong>New Product</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                                                       
                                                        <form action="{{url('/newsave')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                        {{ csrf_field() }}
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <input type="text" value="" id="text-input" name="name" placeholder="name" required class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group position-relative">
                                                                <div class="edit-image item-center">
                                                                    <img id="main-image" src="{{url('/')}}/images/default.jpg" width="300px"/>
                                                                   
                                                                        <input type="file" name="main-image" id="file" class="inputfile" />
                                                                        <label for="file" class="select-image"><i class="fa  fa-pencil-square"></i></label>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                
                                                             
                                                               
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Category</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="category" id="SelectLm" class="form-control-sm form-control">
                                                                            @foreach ($category as $item)
                                                                            <option value="{{$item->category}}">{{$item->category}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Add other images</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <input type="file" id="file-multiple-input" name="others[]" multiple="" class="form-control-file">
                                                                    <div id ="image_preview">

                                                                    </div>
                                                                </div>
                                                                


                                                                <script src="{{url('/')}}/vendors/jquery/dist/jquery.min.js"></script>
                                                                <script type="text/javascript">


                                                                        $("#file-multiple-input").change(function(){
                                                                            $('#image_preview').html("");
                                                                            var total_file=document.getElementById("file-multiple-input").files.length;


                                                                            for(var i=0;i<total_file;i++)
                                                                            {
                                                                            $('#image_preview').append("<img class='append_img' src='"+URL.createObjectURL(event.target.files[i])+"' width='100px' height='100px'>");
                                                                            }


                                                                        });
                                                                       


                                                                        function readURL(input) {
                                                                            if (input.files && input.files[0]) {
                                                                                var reader = new FileReader();

                                                                                reader.onload = function (e) {
                                                                                    $('#main-image').attr('src', e.target.result);
                                                                                }

                                                                                reader.readAsDataURL(input.files[0]);
                                                                            }
                                                                        }

                                                                        $("#file").change(function(){
                                                                            readURL(this);
                                                                        });




                                                                       


                                                                </script>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">SDS</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    
                                                                    <input type="text" value="" id="text-input-sds" name="sds" placeholder="sds" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">TDS</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    
                                                                    <input type="text" value="" id="text-input-tds" name="tds" placeholder="tds" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Ideas how to use this</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    
                                                                    <input type="text" value="" id="text-input-sds" name="idea" placeholder="idea" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Similar Products</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    
                                                                    <input type="text" value="" id="text-input-sds" name="similar" placeholder="similar" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-6 item-center">
                                                                    
                                                                    <button type="reset" class="btn btn-danger btn-sm float-left">
                                                                        <i class="fa fa-ban"></i> Reset
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary btn-sm float-right">
                                                                    <i class="fa fa-dot-circle-o"></i> Save
                                                                    </button>
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

                                         

                                         
                                    
                                           
                                            

                                              

                                            
                          

