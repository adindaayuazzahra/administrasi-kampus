@extends('layout/main')

@section('title', 'Web Universitas')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <!-- PROFILE HEADER -->
                <div class="profile-header">
                    <div class="profile-main">
                        <img src="{{asset('assets/img/ini.png')}}" class="img-circle" alt="Avatar" width="13%">
                        <h2 class="name"><strong>{{Auth::user()->name}}</strong></h2>
                        <span class="online-status status-available">Available</span>
                    </div>
                    <div class="profile-stat">
                        <div class="row">
                            <div class="col-md-4 stat-item">
                                <h4><strong>{{Auth::user()->name}}</strong></h4>
                            </div>
                            <div class="col-md-4 stat-item">
                                <h4><strong>{{Auth::user()->level}}</strong></h4>
                            </div>
                            <div class="col-md-4 stat-item">
                                <h4><strong>{{Auth::user()->address}}</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE HEADER -->
            </div>
            <div class="panel" style="background-color:lightgray;">
                <div class="panel-body">
                    <p style="font-family:'Roboto Slab', serif; font-size:60px;font-weight:bold;text-align: center;color:rgb(0, 0, 0);">Wellcome, {{Auth::user()->name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection