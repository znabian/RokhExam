@extends('layouts.master')

@section('title','404')

@section('style')
<style>
.txt404
         {
            color: #042d93;
            font-size: 83pt;
            font-weight: bold;
            text-shadow: 11px 1px #042fa761;
            text-align: center;
        }
        .des404 {
            font-weight: 500;
            font-size: 10pt;
            font-family: peyda;
            color: #878787;
            text-align: center;
        }
</style>
@endsection
@section('content')

<div class="row d-flex justify-content-center">
  <div class="mt-2 m-auto">
           <h1 class="txt404">404</h1>
            <p class="des404">صفحه درخواستی شما یافت نشد</p>

</div>
</div>

@endsection
