@extends('layouts.master')

@section('title','نتیجه تست سلامت')

@section('style')
<style>
    .active{
    color: #042fa7 !important;
	cursor: default!important;
}
#resVideo 
{
	max-height:35vh;
}
.c-pointer
{
	cursor: pointer;
}
</style>
@endsection
@section('content')

<div class="row d-flex justify-content-center">
  <div class="mt-2 m-auto">
        <h1 class="text-primary">نتیجه آزمون شما</h1>
        @if(!$user->exams)
                <p>شما در آزمون تست سلامت مو شرکت نکرده اید</p> 
        @else
            <p style="text-align: justify;">
            با توجه به ارزیابی تخصصی سلامت موی شما، مجموعه‌ای از {{($uR['Files'])?count(json_decode($uR['Files'],1)) :'چند'}} ویدیو آموزشی تهیه شده است که هر یک بخش مهمی از فرآیند مراقبت و تقویت مو را پوشش می‌دهند. توصیه می‌شود تمامی ویدیوها را به ترتیب مشاهده فرمایید تا از تمامی نکات و توصیه‌های علمی بهره‌مند شوید.
            </p>
            <div class="mt-2 align-items-center d-flex p-0 position-relative ">
            
                <i class="col  vbtn fa fa-angle-right fa-3x btn position-absolute text-light " style="z-index:1;" type="button" data-type="next" ></i>
            <video id="resVideo"  class="col-12" style=" border-radius: 20px; background-color: #042fa7;object-fit: none;" poster="{{asset('images/kb.png')}}" oncontextmenu="return false;" controls controlsList="nodownload" ></video>
                        <i class="col   vbtn fa fa-angle-left fa-3x btn position-absolute text-light" style="left:1;" type="button" data-type="prev"></i>
                            
            </div>
            <div dir="ltr" class="d-flex gap-2 justify-content-center mt-2">
                            
                @foreach(json_decode($uR['Files']) as $file)
                <i data-type="{{$loop->index}}" class="dotbtn c-pointer fa @if($loop->first) fa-circle active @else fa-circle-o @endif "></i>
                @endforeach               
                    
            </div>
        @endif
</div>
</div>
@endsection
@if($user->exams)
@section('script')

    <script>
        src=JSON.parse('{!! $uR['Files'] !!}');
        index=0;
        repeat=0;

    src.forEach((itm,i) => {
                if(i>0)
                {
                    const originalLetter = itm.split('Exam/')[1].split(' -')[0]; 
                    src[i] = replaceLetterInURL(itm, originalLetter);
					src[i]=src[i].replace('http://185.116.161.39:8012/','https://kakheroshd.ir:448/');
                }
            else
			src[i]=src[i].replace('http://185.116.161.39:8012/','https://kakheroshd.ir:448/');
			resVideo.src=src[index];
        });

        $(document).ready(function(){
           
            if( !resVideo.src)
            {
                resVideo.src=src[index];
               // index++;

            }
            $(".vbtn").on('click', function () {
                const btn = $(this);
                if(btn.data('type')=="prev")
                {
                    changeVideo(0);
                }
                else
                {
                    changeVideo();
                }
            });

            $(".dotbtn").on('click', function () {
                const btn = $(this);
                if(!btn[0].classList.contains('active'))
                {
                    PlayVideo(btn.data('type'));
                    document.querySelectorAll(".dotbtn.active").forEach(element => {
                        element.classList.remove('active')
                        element.classList.remove('fa-circle')
                        element.classList.add('fa-circle-o')
                    });
                    this.classList.add('active','fa-circle');
                }
            });

            resVideo.addEventListener("ended", function(){
                        changeVideo();
                     
                    });
            resVideo.addEventListener("play", function(){
                resVideo.style.objectFit='contain';
                //resVideo.classList.remove('col-md-8');
            });
            });


function changeVideo(next=1)
{
    if(next)
    index++;
    else
    index--;

    if(index<=0 || index>src.length-1)
    {
        /*if(index>=src.length)
        repeat=1;*/
        if(index<0)
        index=src.length-1;
		else
        index=0;
        play=0;
    }
    else
    {
        play=1;
        /*currentChar = src[index].split('Exam/')[1].split(' -')[0];
        nextChar = String.fromCharCode(currentChar.charCodeAt(0) + 1);
        src[index]=src[index].split('Exam/')[0]+src[index].split('Exam/')[0].split(' -')[0];*/
       /* if(!repeat)
        {
        const originalLetter = src[index].split('Exam/')[1].split(' -')[0]; 
        src[index] = replaceLetterInURL(src[index], originalLetter);
        }*/
        
    }
    
    resVideo.src=src[index];
    /*if(play)
    resVideo.play();*/
    document.querySelectorAll(".dotbtn.active").forEach(element => {
                        element.classList.remove('active')
                        element.classList.remove('fa-circle')
                        element.classList.add('fa-circle-o')
    });
    document.querySelector(".dotbtn[data-type='"+index+"']").classList.add('active','fa-circle');
resVideo.style.objectFit='none';
    //index++;
}function PlayVideo(id=0)
{
    index=id;
    resVideo.src=src[index];
resVideo.style.objectFit='none';
    //resVideo.play();
}
function replaceLetterInURL(url, targetLetter)
 {
	 if(['A','B','C','D'].includes(targetLetter))
	 return url;
    const index = url.lastIndexOf(targetLetter);
    if (index === -1) {
        console.log("حرف مورد نظر پیدا نشد");
        return url;
    }
    const nextChar = String.fromCharCode(targetLetter.charCodeAt(0) + 1);
    const newURL = url.substring(0, index) + nextChar + url.substring(index + 1);
    return newURL;
}
    </script>
@endsection
@endif