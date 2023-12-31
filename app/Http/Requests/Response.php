<?php 

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

/**
* 
*/
trait Response 
{

    
	
	protected function failedValidation(Validator $validator) 
    {
        // dd((object)$validator->errors()->all());
        if ((\Request::ajax() && ! \Request::pjax()) || \Request::wantsJson()) 
        {

            throw new HttpResponseException(
                response()->json([
                    'success'  => false,
                    'code'    => 200,
                    'action'  => isset($this->action) ? $this->action : "",
                    'message' => $validator->errors()->first(),
                    'data'    => (object)$validator->errors()->all()
                ], 200) ); 
        
        }else{

            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
            
        }

      
    }
}