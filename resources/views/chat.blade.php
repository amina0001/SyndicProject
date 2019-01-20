

@extends('layouts.app')

@section('content')

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
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header" style="">
                    <a id="menuToggle" class="menutoggle" style="" ><i class="fa fa-bars"></i></a>
                    <a href="{{route('home')}}" ><img src="images/fsmsyndic.png" alt="Logo" id="logo" style="">
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
        </header><!-- /header -->
        <!-- Header-->

        <!-- Header-->

<div class="col-lg-12">
                    <div class="card" >
                        <div class="card-body">
                            <h4 class="card-title box-title">Live Chat</h4>
                            <div class="card-content ">
                                <div class="messenger-box" >
                                    <ul  class="chat-content">
                                       
                                        <li> 
                                            
                                       <chat-messages :messages="messages" :user="{{ json_encode(Auth::user()) }}"></chat-messages>
                                          
                                                   
                                            
                                        </li>
                                    </ul>
                                    <div class="send-mgs">
                                        <div class="panel-footer">
                                            <chat-form
                                                v-on:messagesent="addMessage"
                                                :user="{{ Auth::user() }}"
                                            ></chat-form>
                                        </div>
                                    </div>
                                </div><!-- /.messenger-box -->
                            </div>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>

@endsection