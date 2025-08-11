@extends('layouts.master')

@section('title',"ورود")

@section('content')


<div class="row d-flex justify-content-center">
  <div class="col-lg-6 col-sm-6">
  <div class="p-2">
          ورود به پنل کاربری KB
    </div>
    
        <form action="{{route('login')}}" method="POST">
            @csrf
          <!-- phone input -->
          <div class="form-outline mb-4">
            <label class="form-label pull-right" for="phone">شماره همراه</label>
            <input required type="number" id="phone" name="Phone" class="form-control" value="{{old('Phone')}}"/>
              @if ($errors->has('Phone'))
                <div class="text-danger pull-right" role="alert">{{ $errors->first('Phone') }}</div>
              @endif
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label pull-right" for="password">رمزعبور</label>
            <input required type="password" name="password" class="form-control" />
              @if ($errors->has('password'))
                <div class="text-danger pull-right" role="alert">{{ $errors->first('password') }}</div>
              @endif
          </div>

          
        <div class="form-outline mb-4 d-none">
        <label class="form-label pull-right" for="remember" style="font-weight: normal;">
          <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
          مرا به خاطر بسپار
        </label>
      </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-success w-100 ">
          ورود
          </button>

        
          
        </form>
       
  </div>
</div>

@endsection
