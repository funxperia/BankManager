@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">取款</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'drawMoney.update','method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('drawMoney','请输入取款金额',['class' => 'control-label col-md-4 text-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('drawMoney',null,['class' => 'form-control']) !!}
                                <span class="help-block">请注意，您只可以取整数金额！</span>
                                @include('errors/1000')
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('取款',['class' => 'btn btn-primary']) !!}
                                <span style="float: right;"><a class="btn btn-link" href="{{ url('/') }}">返回首页</a></span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection