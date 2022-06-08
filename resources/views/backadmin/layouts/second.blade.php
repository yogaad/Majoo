<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="MAJOO INDONESIA">
    <meta name="keywords" content="manajemen iklan">
    <meta name="author" content="PENTACODE">
    <title>MAJOO INDONESIA | {{ $title ?? '' }}</title>
    <link rel="apple-touch-icon" href="{{ asset('backadmin/theme/images/ico/apple-icon-120.png') }}">
    @php
        $fav = App\Models\Logo::where('name','logofavicon')->first();
    @endphp
    <link rel="shortcut icon" type="image/x-icon" href="{{ $fav ? asset('storage/logo/'.$fav->file) : asset('backadmin/images/logo/fsavicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

 


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backadmin/theme/vendors/css/extensions/toastr.min.css') }}">
    @yield('vendor-css')

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->      
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/themes/semi-dark-layout.css') }}"> 

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/core/menu/menu-types/horizontal-menu.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/plugins/extensions/ext-component-toastr.css') }}">
   
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/theme/css/plugins/forms/wizard.css') }}"> 
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backadmin/app/css/style.css') }}">

    <!-- END: Custom CSS-->
    <style> 
    @import url('https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i');
body{
  font-family: 'Muli', sans-serif;
  background:#ddd;
}
.shell{
  padding:50px 0;
}
.wsk-cp-product{
  background:#fff;
  padding:15px;
  border-radius:6px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  position:relative;
  margin:20px auto;
}
.wsk-cp-img{
  position:absolute;
  top:5px;
  left:50%;
  transform:translate(-50%);
  -webkit-transform:translate(-50%);
  -ms-transform:translate(-50%);
  -moz-transform:translate(-50%);
  -o-transform:translate(-50%);
  -khtml-transform:translate(-50%);
  width: 100%;
  padding: 15px;
  transition: all 0.2s ease-in-out;
}
.wsk-cp-img img{
  width:100%;
  transition: all 0.2s ease-in-out;
  border-radius:6px;
}
.wsk-cp-product:hover .wsk-cp-img{
  top:-10px;
}
.wsk-cp-product:hover .wsk-cp-img img{
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
.wsk-cp-text{
  padding-top:150%;
}
.wsk-cp-text .category{
  text-align:center;
  font-size:12px;
  font-weight:bold;
  padding:5px;
  margin-bottom:45px;
  position:relative;
  transition: all 0.2s ease-in-out;
}
.wsk-cp-text .category > *{
  position:absolute;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%);
  -webkit-transform: translate(-50%,-50%);
  -moz-transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  -o-transform: translate(-50%,-50%);
  -khtml-transform: translate(-50%,-50%);
    
}
.wsk-cp-text .category > span{
  padding: 12px 30px;
  border: 1px solid #313131;
  background:#212121;
  color:#fff;
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
  border-radius:27px;
  transition: all 0.05s ease-in-out;
  
}
.wsk-cp-product:hover .wsk-cp-text .category > span{
  border-color:#ddd;
  box-shadow: none;
  padding: 11px 28px;
}
.wsk-cp-product:hover .wsk-cp-text .category{
  margin-top: 0px;
}
.wsk-cp-text .title-product{
  text-align:center;
}
.wsk-cp-text .title-product h3{
  font-size:20px;
  font-weight:bold;
  margin:15px auto;
  overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  width:100%;
}
.wsk-cp-text .description-prod p{
  margin:0;
}
/* Truncate */
.wsk-cp-text .description-prod {
  text-align:center;
  width: 100%;
  height:62px;
  overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  margin-bottom:15px;
}
.card-footer{
  padding: 25px 0 5px;
  border-top: 1px solid #ddd;
}
.card-footer:after, .card-footer:before{
  content:'';
  display:table;
}
.card-footer:after{
  clear:both;
}

.card-footer .wcf-left{
  float:left;
  
}

.card-footer .wcf-right{
  float:right;
}

.price{
  font-size:18px;
  font-weight:bold;
}

a.buy-btn{
  display:block;
  color:#212121;
  text-align:center;
  font-size: 18px;
  width:35px;
  height:35px;
  line-height:35px;
  border-radius:50%;
  border:1px solid #212121;
  transition: all 0.2s ease-in-out;
}
a.buy-btn:hover , a.buy-btn:active, a.buy-btn:focus{
  border-color: #FF9800;
  background: #FF9800;
  color: #fff;
  text-decoration:none;
}
.wsk-btn{
  display:inline-block;
  color:#212121;
  text-align:center;
  font-size: 18px;
  transition: all 0.2s ease-in-out;
  border-color: #FF9800;
  background: #FF9800;
  padding:12px 30px;
  border-radius:27px;
  margin: 0 5px;
}
.wsk-btn:hover, .wsk-btn:focus, .wsk-btn:active{
  text-decoration:none;
  color:#fff;
}  
.red{
  color:#F44336;
  font-size:22px;
  display:inline-block;
  margin: 0 5px;
}
@media screen and (max-width: 991px) {
  .wsk-cp-product{
    margin:40px auto;
  }
  .wsk-cp-product .wsk-cp-img{
  top:-40px;
}
.wsk-cp-product .wsk-cp-img img{
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
  .wsk-cp-product .wsk-cp-text .category > span{
  border-color:#ddd;
  box-shadow: none;
  padding: 11px 28px;
}
.wsk-cp-product .wsk-cp-text .category{
  margin-top: 0px;
}
a.buy-btn{
  border-color: #FF9800;
  background: #FF9800;
  color: #fff;
}
}
    </style>
</head>
<!-- END: Head--> 
<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
   
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-brand-center">
  
    
        <div class="navbar-header d-xl-block d-none">
         
                <ul class="nav navbar-nav">
                    <li > Majoo Teknologi Indonesia </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            {{-- <span class="user-name font-weight-bolder">{{ auth()->user()->name }}</span>
                            <span class="user-status">{{ auth()->user()->getDivisionLabel() }}</span> --}}
                        </div>
                        <span >
                           
                            <a href="{{ route('backadmin.auth.index') }}" class="btn  "> <img   src="{{ asset('backadmin/app/img/login.png') }}"  height="30" width="30"> </a>
                            {{-- <span class="avatar-status-online"></span> --}}
                        </span>
                    </a>
                   
                </li>
            </ul>
       
    </nav> 
   

    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
       
        {{-- <div class="header-navbar-shadow"></div> --}}
     
            <div class="content-body">
          


<div class="shell">
 {{   $subtitle }}
  <div class="container">
    <div class="row"> @foreach ($data as $v)
      <div class="col-md-3">
        <div class="wsk-cp-product">
          <div class="wsk-cp-img">
            <img src=" {{ asset('storage/attachment/'.$v->image)}}" alt="Product" class="img-responsive" />
          </div>
          <div class="wsk-cp-text">
            <div class="title-product">
                <br>
            <p align="center">Rp. {{$v->harga_produk}}</p>
            </div>
            <div class="title-product">
              <h3> {{$v->nama_produk}}</h3>
            </div>
            <div class="description-prod">
              <p> {!! nl2br($v->deskripsi_produk) !!}</p>
            </div>
            <div class="card-footer">
                <div class="category">
                    <span>Beli</span>
                  </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

            </div>
            <div class="content-header-right text-md-right col-12">
                <div class="form-group breadcrumb-right d-flex d-md-block align-items-center justify-content-between">
                    @yield('actions')
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">Copyright &copy; 2022<a class="ml-25" href="javascript:void(0)" target="_blank">MAJOO INDONESIA</a></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    @stack('modal')

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backadmin/theme/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('backadmin/theme/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('backadmin/theme/vendors/js/extensions/moment.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    @yield('vendor-js')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backadmin/theme/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('backadmin/theme/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->
    
    @include('backadmin.layouts.toastr')


    @stack('page-js-before')

    <!-- BEGIN: Page JS-->
    @stack('page-js')
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>