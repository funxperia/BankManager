@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>记录号</th>
                            <th>操作</th>
                            <th>数目</th>
                            <th>时间</th>
                        </tr>
                        @if($liuShui)
                            @foreach($liuShui as $liuShuis)
                                <tr>
                                    <td>{{$liuShuis -> id}}</td>
                                    <td>{{$liuShuis -> status}}</td>
                                    <td>{{$liuShuis -> operate}}</td>
                                    <td>{{$liuShuis -> created_at}}</td>
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