<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SyndicTN</title>
    <meta name="description" content="SyndicTN">
    <link rel="shortcut icon" href="images/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/syn/bootstrap.min.css">
    <script src="/js/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

    <script src="/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/pe-icon-7-filled.css">

    <link href="/css/fullcalendar.css" rel="stylesheet" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

    <!-- Styles -->
    <style type="text/css">
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        .subtitle {
            margin: 0 0 2em 0;
        }
        .fancy {
            line-height: 0.5;
            text-align: center;
        }
        .fancy span {
            display: inline-block;
            position: relative;
        }
        .fancy span:before,
        .fancy span:after {
            content: "";
            position: absolute;
            height: 8px;
            border-bottom: 2px solid grey;
            border-top: 2px solid grey;
            top: 0;
            width: 70%;
        }
        .fancy span:before {
            right: 100%;
            margin-right: 15px;
        }
        .fancy span:after {
            left: 100%;
            margin-left: 15px;
        }
        hr.style-seven {
            overflow: visible; /* For IE */
            height: 30px;
            border-style: solid;
            border-color: black;
            border-width: 1px 0 0 0;
            border-radius: 20px;
        }
        hr.style-seven:before { /* Not really supposed to work, but does */
            display: block;
            content: "";
            height: 30px;
            margin-top: -31px;
            border-style: solid;
            border-color: black;
            border-width: 0 0 1px 0;
            border-radius: 20px;
        }

    </style>
</head>
<body>

<!-- Left Panel -->
<aside id="left-panel" class="left-panel">

    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(auth::user()->role === "Syndic" || auth::user()->role === "Occupant")
                    <li >
                        <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>tableau de bord </a>
                    </li>
                    <li >
                        <a  href="{{ route('depensesSyndic') }}"> <i class="menu-icon fa fa-table"></i>Dépense</a>

                    </li>
                    <li >
                        <a  href="{{ route('recetteSyndic') }}"> <i class="menu-icon fa fa-th"></i>Recette</a>

                    </li>
                    <li>
                        <a  href="{{ route('reunionSyndic') }}"> <i class="menu-icon fa fa-user-circle"></i>Reunion</a>

                    </li>
                    @if(auth::user()->role === "Syndic")
                       <li >
                           <a  href="{{ route('occupant') }}"> <i class="menu-icon fa fa-user"></i>Occupants</a>

                       </li>
                        @endif
                    @elseif(auth::user()->role = "admin" )
                       <li >
                           <a href="{{url('/admin/home')}}"><i class="menu-icon fa fa-laptop"></i>tableau de bord </a>
                       </li>
                       <li >
                           <a  data-toggle="modal" data-target="#myModal_occupant"><i class="menu-icon fa fa-users"></i>Les Utilisateurs</a>
                       </li>
                       <li >
                           <a  href="#"> <i class="menu-icon fa fa-table"></i>Gerer des  occupants </a>

                       </li>
                       @endif





</ul>
</div><!-- /.navbar-collapse -->
</nav>
</aside>  <!-- /#left-panel -->
<!-- Left Panel -->



<!-- Right Panel -->
<div id="right-panel" class="right-panel"  >

<!-- Header-->
<header id="header" class="header">
<div class="top-left">
<div class="navbar-header" style="width: 50%">
<a id="menuToggle" class="menutoggle" style="margin-top: 10%;" ><i class="fa fa-bars"></i></a>
<a href="{{url('/')}}" ><img src="/images/fsmsyndic.png" alt="Logo" style="width: 150px;
height: 120px;margin-top: -60%;margin-left: 30%">
</a>


</div>
</div>
<div class="top-right">
<div class="header-menu" style="padding-top: 1%;background:#f6f6e9">
@if(auth::user()->role !== "admin" )
<div class="header-left">



   <div class="dropdown">
       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-bell"></i>
            @if($i !== 0)
                <span class="count bg-danger">{{ $i }}</span>
            @endif
       </button>
       @if($notifications->isNotEmpty())
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <h4> Réunion :</h4>
                    @foreach($notifications as $r)

                        @if($r->seen == 0)
                            @if(strtotime(date("Y-m-d")) < strtotime($r->date))
                                <form action="{{ route('reunionSeen',$r->id ) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $r->id }}">
                                    <input type="hidden" name="user_id" value="{{ $r->user_id }}">
                                    <input type="hidden" name="reunion_id" value="{{ $r->reunion_id }}">
                                    <p>Sujet: {{ $r->category }} <button type="submit" style="background: transparent;"> <i class="fa fa-eye-slash"></i></button>
                                    </p>
                                </form>




                            @endif
                        @endif
                    @endforeach

       </div>
       @endif
   </div>




</div>
@endif
    @if(auth::user()->role !== "admin" )

    <div class="header-left" style="margin-left: 1%">
    <div class="dropdown for-message">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-envelope"></i>
            @if($msg !== null && $msg->seen === 0)
                <span class="count bg-primary">1</span>
            @else

            @endif
        </button>
        @if($msg !== null )
            @if($msg->seen === 0)
                <div class="dropdown-menu" aria-labelledby="message">

                    <a class="dropdown-item media" href="{{url("/chat")}}">
                        <form action="{{ route('msgSeen',$msg->id ) }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $msg->id }}">
                            <input type="hidden" name="user_id" value="{{ $msg->user_id }}">
                            <input type="hidden" name="reunion_id" value="{{ $msg->msg_id }}">
                            <div class="message media-body">
                                <span class="name float-left">message non lue:</span>
                                <span class="time float-left">{{ $msg->created_at }}</span>
                                <p>{{ $msg->message }} <button type="submit" style="background: transparent;"> <i class="fa fa-eye-slash"></i></button></p>
                            </div>
                        </form>

                    </a>
                </div>
            @endif
        @endif

    </div>
    </div>
    @endif
<div class="user-area dropdown float-right">
   <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <img class="user-avatar rounded-circle" src="{{ Auth::user()->photo }}" style="width: 50px;height: 50px;">
   </a>

   <div class="user-menu dropdown-menu">
       <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i>Acceuil</a>
       @if(auth::user()->role === "Syndic" || auth::user()->role === "Occupant")
       <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-columns"></i>tableau de bord</a>
       @elseif(auth::user()->role = "admin" )
       <a class="nav-link" href="{{ url('/admin/home') }}"><i class="fa fa-columns"></i>site admin</a>
       @endif
       <a class="nav-link" href="{{ route('profile', [Auth::id()]) }}"><i class="fa fa-user"></i>Mon profile</a>

       <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
           <i class="fa fa-power-off"></i> Déconnecter</a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>

   </div>
</div>
</div>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            var url = window.location;
            $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
            $('ul.nav a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');
        });
    </script>
</header><!-- /header -->