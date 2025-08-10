<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Controllers\FunctionController;

class UniqueUserApi implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $field ;
    protected $eid ;
    public function __construct($field,$exam )
    {
        $this->field  = $field ;
        $this->eid  = $exam ;
    }
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $func=new FunctionController();
            $uc = $func->getData('select',[$this->field => $value],'chkUser',1,0,$this->eid)->first()['userC']??-1;
    
            if ($uc>=0 && $uc<1)            
                return true;
    
            return false;
        } catch (\Throwable $th) {
           dd($th);
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $func=new FunctionController();
        $ex = $func->getData('select',['Id' => $this->eid],'Exam',1)->first()['Name']??'تست پوست';
    
        return "شما قبلا در $ex  شرکت کردید";
    }
}
