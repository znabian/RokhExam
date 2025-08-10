<div class="col-12 question text-end @if($loop->index > 0) d-none @endif"  data-type="descriptive">
    <div class="form-group">
        <label for="" class="form-label  fw-bold">{{($loop->index+1).'- '.$label}}</label>
        <input class="form-control" type="text" name="{{$inputName}}" @if($loop->index == 0) autofocus @endif>
    </div>
    <button type="button" data-type="next" class="btn btn-primary fw-bold mt-4 pull-left">بعدی
        <i class="mx-2 fa fa-angle-left"></i>
    </button>
    @if($loop->index > 0)
    <button type="button" data-type="prev"  class="btn btn-primary fw-bold mt-4 pull-right">
        <i class="mx-2 fa fa-angle-right"></i>
        قبلی
    </button>
    @endif
</div>
