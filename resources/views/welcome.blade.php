@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-primary text-center">欢迎使用6666银行<br><small>请点击下方按钮进行操作</small></h1>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-2 col-md-offset-4">
            <a href="/depositval">
                <button type="button" class="btn btn-success btn-lg center-block">我要存款</button>
            </a>
        </div>
        <div class="col-md-2">
            <a href="/drawmoneyval">
                <button type="button" class="btn btn-warning btn-lg center-block">我要取款</button>
            </a>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <h4 class="text-primary text-center">若要查看个人信息和存取记录，请点击右上角用户名查看</h4>
        </div>
    </div>
</div>
@endsection
