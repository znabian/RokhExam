@extends('layouts.master')

@section('title','تست سلامت')

@section('content')

<div class="row d-flex justify-content-center">
  <div class="mt-2">
        <form class="d-flex">

            @foreach($infoData as $info)
                @include('layouts.includes.descriptive_question',[
                    'label'=>$info['label'],
                    'inputName'=>$info['inputName']
                ])
            @endforeach

            @foreach($questions->sortBy('Number') as $question)
            @php
            $question=(object) $question;
            @endphp
                @include('layouts.includes.question',[
                    'label'=>$question->Text,
                    'answers'=>json_decode($question->Answers,1),
                    'inputName'=>$question->Number,
                    'inputId'=>$question->Id,
                    'num'=>$question->Number+count($infoData),
                ])
            @endforeach

        </form>

        </div>
</div>


@endsection

@section('script')

    <script>

        const questionsCount = {{count($infoData) + count($questions)}};
        let questionsIndex = 1;

        $(".question button").on('click', function () {

            // get btn question div:
            const btn = $(this);
            const div = btn.closest("div");
            if(btn.data('type')=="prev")
            {
                div.addClass('fading');
                setTimeout(function () {
                    div.addClass('d-none');
                    div.removeClass('fading');
                    div.prev().find('input').first().focus();
                    div.prev().find('button').first().prop('disabled', '');
                    // showing next question:
                    div.prev().removeClass('d-none');
                    div.prev().removeClass('fading');
                }, 300)
                questionsIndex--;
            }
            else
            {
                
                // store answer:
                const questionType = div.data('type');

                let value;
                let category;

                if (questionType === 'descriptive') {
                    value = div.find('input').first().val();
                    category = 'info';
                } else if (questionType === 'test') {
                    value = div.find('input[type="radio"]:checked').val();
                    category = 'survey';
                } else {
                    value = '';
                }

                btn.prop('disabled', 'disabled');

                $.ajax({
                    url: `{{route('survey.info.store')}}`,
                    type: 'POST',
                    data: {
                        _token: `{{csrf_token()}}`,
                        step: questionsIndex,
                        quiz: div.find('input').data('quiz'),
                        name: div.find('input').attr('name'),
                        value: value,
                        category: category,
                        qcount: questionsCount,
                        eid: {{$eid}}
                    },

                    success: function (response) {

                        if (Object.hasOwn(response, 'redirect')) {
                            window.location.href = response.redirect;
                        }

                        // fading animation:
                        div.addClass('fading');
                        setTimeout(function () {
                            div.addClass('d-none');
                            // replace focus to nex input:
                            // div.find('input[autofocus]').removeAttr('autofocus');
                            div.next().find('input').first().focus();
                            // showing next question:
                            div.next().removeClass('d-none');
                        }, 300)

                        // increase index:
                        questionsIndex++;

                    },


                    error: function (xhr) {

                        btn.removeAttr('disabled');

                        const response = JSON.parse(xhr.responseText).errors;
                        const errorMessage = response[Object.keys(response)[0]];
                        // show error message
                        div.find('.error-message').remove();
                        div.find('.form-group').after(`<p class="error-message fs-6 mt-1 mb-0">${errorMessage}</p>`);
                    },
                });

            }


        });


        $("input[type='text']").on('keyup', function (event) {
            if (event.keyCode === 13) {
                $(this).closest('div.question').find('button').click();
            }
        });


    </script>

@endsection

