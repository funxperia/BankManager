@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>用户名</th>
                            <th>邮箱</th>
                            <th>身份证</th>
                            <th>电话</th>
                            <th>余额</th>
                        </tr>
                        @if($user)
                            @foreach($user as $users)
                                <tr>
                                    <td>{{$users -> name}}</td>
                                    <td>{{$users -> email}}</td>
                                    <td>{{$users -> pincodes}}</td>
                                    <td>{{$users -> phone}}</td>
                                    <td>{{$users -> balance}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <span class="center-block"><a class="btn btn-link" href="{{ url('/') }}">返回首页</a></span>
            </div>
        </div>
    </div>
@endsection