

@extends('layouts.app')

@section('content')

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">

        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li >
                        <a  href="{{ route('depensesSyndic') }}"> <i class="menu-icon fa fa-table"></i>Dépense</a>

                    </li>
                    <li >
                        <a  href="{{ route('recetteSyndic') }}"> <i class="menu-icon fa fa-th"></i>Recette</a>

                    </li>
                    <li >
                        <a  href="{{ route('reunionSyndic') }}"> <i class="menu-icon fa fa-th"></i>Reunion</a>

                    </li>




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
                <div class="navbar-header" style="width: 50%">
                    <a id="menuToggle" class="menutoggle" style="margin-top: 10%;" ><i class="fa fa-bars"></i></a>
                    <a href="{{route('home')}}" ><img src="images/fsmsyndic.png" alt="Logo" style="width: 150px;
    height: 120px;margin-top: -60%;margin-left: 30%">
                    </a>


                </div>
            </div>
            <div class="top-right">
                <div class="header-menu" style="padding-top: 1%;background:#f6f6e9">
                    <div class="header-left">



                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                @if($i !== 0)
                                    <span class="count bg-danger">{{ $i }}</span>
                                @endif
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if($notifications->isNotEmpty())
                                    @foreach($notifications as $r)

                                        @if($r->seen == 0)
                                            @if(strtotime(date("Y-m-d")) < strtotime($r->date))
                                                <form action="{{ route('reunionSeen',$r->id ) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $r->id }}">
                                                    <input type="hidden" name="user_id" value="{{ $r->user_id }}">
                                                    <input type="hidden" name="reunion_id" value="{{ $r->reunion_id }}">
                                                    <p>Topic: {{ $r->category }} <button type="submit" style="background: transparent;"> <i class="fa fa-eye-slash"></i></button>
                                                    </p>
                                                </form>




                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>

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

                                        <a class="dropdown-item media" href="chat.html">
                                            <form action="{{ route('msgSeen',$msg->id ) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $msg->id }}">
                                                <input type="hidden" name="user_id" value="{{ $msg->user_id }}">
                                                <input type="hidden" name="reunion_id" value="{{ $msg->msg_id }}">


                                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                                <div class="message media-body">
                                                    <span class="name float-left">Jonathan Smith</span>
                                                    <span class="time float-right">{{ $msg->created_at }}</span>
                                                    <p>{{ $msg->message }} <button type="submit" style="background: transparent;"> <i class="fa fa-eye-slash"></i></button></p>
                                                </div>
                                            </form>

                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/amina.jpg" alt="User Avatar" style="width: 50px;height: 50px;">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-screen"></i>welcome</a>
                            <a class="nav-link" href="{{ route('profile', [Auth::id()]) }}"><i class="fa fa-user"></i>My Profile</a>



                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
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
                            <div class="card-content">
                                <div class="messenger-box" >
                                    <ul >
                                       
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