@extends('layouts.master')

@section('title',$exam['Name'])

@section('content')


<div class="row d-flex justify-content-center">
  <div class="col-lg-6 col-sm-6">
  <div class="p-2">
           {!! $exam['Description'] !!}
    </div>
       
            <a href="{{route('survey.start')}}" class="btn btn-primary fw-bold">شروع
                <i class="mx-2 fa fa-arrow-left"></i>
            </a>
       
  </div>
</div>

@endsection
