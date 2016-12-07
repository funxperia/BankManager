@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-primary text-center">取款成功！</h1><br>
                <span class="center-block"><a class="btn btn-link" href="{{ url('/') }}">返回首页</a></span>
            </div>
        </div>
    </div>
@endsection