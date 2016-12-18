@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">存款</div>
                    <div class="panel-body">
                        {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/deposit/update') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label for="deposit" class="col-md-4 control-label">请输入存款金额</label>

                                <div class="col-md-6">
                                    <input id="deposit" type="text" class="form-control" name="deposit">
                                    <span class="help-block">请注意，您只可以存整数金额！</span>

                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert" style="margin: 10px 0 0 0;padding: 8px 5px;">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> 存款
                                    </button>

                                    <span style="float: right;"><a class="btn btn-link" href="{{ url('/') }}">返回首页</a></span>
                                </div>
                            </div>
                        </form>--}}
                        {!!Form::open(['url' => '/deposit/update','method' => 'POST'])!!}
                        <div class="form-group">
                            {!! Form::label('deposit','请输入存款金额',['class' => 'control-label col-md-4 text-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('deposit',null,['class' => 'form-control']) !!}
                                <span class="help-block">请注意，您只可以存整数金额！</span>
                                @include('errors/1000')
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('存款',['class' => 'btn btn-primary']) !!}
                                <span style="float: right;"><a class="btn btn-link" href="{{ url('/') }}">返回首页</a></span>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection