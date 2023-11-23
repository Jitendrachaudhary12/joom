<?php

namespace App\Http\Requests\zipRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Models\Container;
use App\Models\ContainerImage;
use File;
use \Request;
use Illuminate\Validation\Rule;
class Downloadzip extends FormRequest
{
    use \App\Http\Requests\Response;
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
        return [
            //
        ];
    }

    public function messages()
    {
        return [
           
        ];
    }
    public function withValidator($validator)
    {
          $id=$this->id;
          // dd($id);
           $data3_cont=ContainerImage::where('container_id',$id)->pluck('url')->toArray();      
        $validator->after(function ($validator) use ($data3_cont)
        {
            if (empty($data3_cont)) 
            {

                $validator->errors()->add('ContainerImage', 'Please Add Images');
            }
        return;
    }); 
    }
}
