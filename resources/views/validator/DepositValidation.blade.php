@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">验证密码</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/deposit') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">密码</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger" role="alert" style="margin: 10px 0 0 0;padding: 8px 5px;">{{ $errors['password'] }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> 验证
                                    </button>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">忘记密码？</a>
                                    <span style="float: right;"><a class="btn btn-link" href="{{ url('/') }}">返回首页</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection