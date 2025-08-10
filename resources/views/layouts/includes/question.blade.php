<div class="col-12 question text-end d-none" data-type="test">
    <div>
        <label for="" class="form-check-label  fw-bold mb-3">{{$num}}- {{$label}}</label>
        @foreach($answers as $key=>$answer)
            <div class="form-check mb-2">
                <input type="radio" class="form-check-input float-end ms-2" data-quiz="{{$inputId}}" name="{{$inputName}}" value="{{$key}}">
                <span>{{$answer['Text']}}</span>
            </div>
                @if($answer['Content'])
                <div class="d-flex justify-content-center">
                     <img hidden src="{{$answer['Content']}}" alt="{{$answer['Text']}}" class="w-25">
                </div>
                @endif
        @endforeach
    </div>
    <button type="button" class="btn btn-primary fw-bold mt-4 pull-left">بعدی
        <i class="mx-2 fa fa-angle-left"></i>
    </button>
    <button type="button" data-type="prev"  class="btn btn-primary fw-bold mt-4 pull-right">
        <i class="mx-2 fa fa-angle-right"></i>
        قبلی
    </button>
</div>
