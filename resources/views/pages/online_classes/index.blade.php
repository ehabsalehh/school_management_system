@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{__("online_classes.Online_Session")}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{__("online_classes.Online_Session")}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('onlineClasses.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__("online_classes.Add_new_session")}}</a>
                                   <a class="btn btn-warning" href="{{route('indirect.create')}}">ا{{__("online_classes.Add_new_session_offline")}}</a>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{__("main_trans.Grade")}}</th>
                                            <th>{{__("main_trans.class")}}</th>
                                            <th>{{__("main_trans.section")}}</th>
                                            <th>{{__("main_trans.Teacher")}}</th>
                                            <th>{{__("online_classes.Session_title")}}</th>
                                            <th>{{__("online_classes.Start_date")}}</th>
                                            <th>{{__("online_classes.Session_time")}}</th>
                                            <th>{{__("online_classes.Session_link")}}</th>
                                            <th>{{__("Fees_trans.Operation")}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$online_classe->grade->Name}}</td>
                                            <td>{{ $online_classe->classroom->Name_Class }}</td>
                                            <td>{{$online_classe->section->Name_Section}}</td>
                                                <td>{{$online_classe->user->name}}</td>
                                                <td>{{$online_classe->topic}}</td>
                                                <td>{{$online_classe->start_at}}</td>
                                                <td>{{$online_classe->duration}}</td>
                                                <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">انضم الان</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.online_classes.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
