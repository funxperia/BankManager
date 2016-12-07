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
                    @if($liushui)
                        @foreach($liushui as $liushuis)
                            <tr>
                                <td>{{$liushuis -> id}}</td>
                                <td>{{$liushuis -> status}}</td>
                                <td>{{$liushuis -> operate}}</td>
                                <td>{{$liushuis -> created_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection