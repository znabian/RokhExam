<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Controllers\FunctionController;
use App\Rules\UniqueUserApi;
class StoreInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $eid=$this->get('eid');
        $func=new FunctionController();
        $quc = $func->getData('select',['where'=>' where examid='.$eid ?? 1],'QuizCount',1)->first()['quc']??0;
        return [
            'qcount'=>'required|numeric',
            'step'=>'required|numeric|max:'.($quc + count(Question::$infoData)),
            'category' => 'required|in:info,survey',
            'name' => 'required|string|max:255',
            'value' => [
                'required',
                Rule::when($this->get('category') === 'survey', ['string', 'max:1']),
                Rule::when($this->get('category') === 'info', ['string', 'max:255']),
                //Rule::when($this->get('name') === 'phone', ['regex:/^09\d{9}$/','unique:Quiz_UserTbl,Phone']),
                Rule::when($this->get('name') === 'phone', ['regex:/^09\d{9}$/',new UniqueUserApi('Phone',$eid ?? 1)]),
                Rule::when($this->get('name') === 'age', ['regex:/^\d{1,2}$/'])
            ]
        ];
    }
}
