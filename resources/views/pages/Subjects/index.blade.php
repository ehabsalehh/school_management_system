@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
      {{ trans('library_trans.Subject_menu')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
      {{ trans('library_trans.Subject_menu')}}
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
                                <a href="{{route('subjects.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة مادة جديدة</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>  {{ trans('library_trans.Subject_name')}}</th>                                            
                                            <th>{{ trans('Students_trans.Grade')}}</th>
                                            <th>{{ trans('Students_trans.classrooms')}}</th>
                                            <th>{{ trans('Teacher_trans.Name_Teacher')}}</th>
                                            <th>{{ trans('Fees_trans.Operation')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subjects as $subject)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$subject->name}}</td>
                                            <td>{{$subject->grade->Name}}</td>
                                            <td>{{$subject->classroom->Name_Class}}</td>
                                            <td>{{$subject->teacher->Name}}</td>
                                                <td>
                                                    <a href="{{route('subjects.edit',$subject->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="  {{ trans('main_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                           @include('pages.Subjects.Delete')
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
