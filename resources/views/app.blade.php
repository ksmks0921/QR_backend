<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QR_backend</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{url('/')}}/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('/')}}/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{url('/')}}/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{url('/')}}/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url('/')}}/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/custom/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>.modal {
    z-index: 1072000;
}</style>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">GloMania</a>
                <a class="navbar-brand hidden" href="/"><img src="{{url('/')}}/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-laptop"></i>All Products </a>
                    </li>
                    <li>
                        <a href="{{url('/new')}}"> <i class="menu-icon fa fa-plus"></i>Add New </a>
                    </li>
                    <li>
                        <a href="{{url('/booking')}}"> <i class="menu-icon fa fa-book"></i>Booking</a>
                    </li>
                    
                    
                   
                   

                    

                   

                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    @yield('content')

    <!-- Right Panel -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="{{url('/')}}/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets/js/main.js"></script>


    <script src="{{url('/')}}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('/')}}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{url('/')}}/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{url('/')}}/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{url('/')}}/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{url('/')}}/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{url('/')}}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{url('/')}}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{url('/')}}/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{url('/')}}/assets/js/init-scripts/data-table/datatables-init.js"></script>


<!-- edit table cell-->










<!-- /modal -->

<div class="modal fade" id="suremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure to delete this item? 
      </div>
      <div class="modal-footer">
        <button  class="btn btn-secondary" data-dismiss="modal">No</button>
        
        <form action = "{{url('/delete-item')}}" method="post">
           
            @csrf
            <input type="hidden" name="proid" id="pro_id" value="">
            <button type="submit" class="btn btn-primary">Yes</button>
        </form>
        
        
      </div>
    </div>
  </div>
</div>
</body>
<script>
 
        function deleteitem(id){
            jQuery( document ).ready(function( $ ) {
                $("#pro_id").val(id);
                $("#suremodal").modal();
            });

        }
</script>
</html>
