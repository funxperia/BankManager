@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">取款</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/drawmoney/update') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="drawmoney" class="col-md-4 control-label">请输入取款金额</label>

                                <div class="col-md-6">
                                    <input id="drawmoney" type="text" class="form-control" name="drawmoney">
                                    <span class="help-block">请注意，您的取款数额不得大于余额，且只能为整数！</span>

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger" role="alert" style="margin: 10px 0 0 0;padding: 8px 5px;">{{ $errors['drawmoney'] }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> 取款
                                    </button>

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