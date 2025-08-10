<html>
    <head>
        <title>سامانه رخ سارا |  @yield('title')</title>
        <meta charset="utf-8">
        <!-- Tell the browser to be responsive to screen width -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/kb.ico') }}">
        
       
    
        <!-- Google Font -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css?10') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css?10') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('Ionicons/css/ionicons.min.css?10') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?11') }}">
        <style>
            *
            {
                /* font-family: peyda; */
                font-size:15px;
            }
            body
            {
                direction:rtl!important;
            }
            .bsnow {
   		/* background-image: url('https://png.pngtree.com/png-clipart/20230914/original/pngtree-cute-fall-leaves-clipart-two-cartoon-leaf-couples-from-autumn-in-png-image_12162719.png');*/
  		  background-repeat: no-repeat;
  		  background-position: 9% center;
   		 background-size: 15rem;
		background-attachment: fixed;
        border: 1px solid #8080803d;
    box-shadow: 1px 5px 16px 4px #8080803d;
		}
        nav
        {
            background-color: #f0ededb3;
        }
        .sidemenu
        {
            list-style: none;
            list-style-type: none;
            display: inline-flex;
            gap: 10px;
            justify-content: flex-start;
            background-color: #f0ededb3;
            width: 100%;
            margin: 0;
        }
        .sidemenu li {
            /*background-color: #f0ededb3;
            border-radius: 0 0 8px 8px ;*/
            padding: 13px;
        }
        .sidemenu li a{
            /* color: #e48a8c; */
            color: #000;
        }
        .sidemenu .lastitem {
            margin-right: auto;
        }
        .sidemenu li.active {
            /*background-color: #f0edede0;
            box-shadow: 0px 0px 16px 4px #75757578;*/
            border-bottom:3px solid #e48a8c;
            font-size:12pt;
            font-weight: bolder;
        }
        .sidemenu li:hover {
            /*background-color: #f0edede0;
            box-shadow: 0px 0px 16px 4px #75757578;*/
            border-bottom:3px solid #e48a8c;
            font-size:12pt;
            font-weight: bolder;
        }
        </style>
        <style>
        .lds-ellipsis {
            display: flex;
            position: absolute;
            width: 77px;
            height: 80px;
            justify-content: center;
            place-items: center;
            left: 46vw;
            top: 50%;
            margin: auto;
        }
        .lds-ellipsis div {
        position: absolute;
        top: 33px;
        width: 13px;
        height: 13px;
        border-radius: 50%;
        background: pink;
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
        left: 8px;
        animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
        left: 8px;
        animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
        left: 32px;
        animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
        left: 56px;
        animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
        }
        @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
        }
        @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(24px, 0);
        }
        }
        .d-none
        {
            display:none;
        }
        </style>
        @yield('style')
    </head>
    <body onload="document.getElementById('loaderDiv').remove();document.getElementById('bodycontent').classList.remove('d-none'); ">
    <div class="lds-ellipsis" id="loaderDiv">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
        <section id="bodycontent" class="text-center d-none">
        <div class="p-5 bg-image" style="background-color: #042fa7;height: 300px;">
                  <div style="display: grid;justify-items: center;color: white;gap: 7px;">
                  <img src="{{ asset('images/kb.png') }}" alt="logo" style="width: 10rem;border-radius:50%;margin-top:3rem;">
                  
                  </div>
                 
            </div>
            <!-- Background image -->
          
            <div class="card col-10 col-md-8 mx-auto shadow-5-strong" style="
            margin:1%;
                  margin-top: -70px;
                  background: hsla(0, 0%, 100%, 0.8);
                  backdrop-filter: blur(30px);
                  ">
              <div class="bsnow card-body" style="padding:2rem 3rem">
                @yield('content')

                     
                </div>
            </div>
</section>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script>
</script>
@yield('script')
</body>
</html>
