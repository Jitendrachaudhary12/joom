<?php

namespace App\Http\Requests\ZipRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Models\Container;
use File;
use \Request;
use Illuminate\Validation\Rule;

class ZipRequest extends FormRequest
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
                
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
           
        ];
    }
    public function withValidator($validator)
    {
          $id=base64_decode($this->id);
          $data=Container::where('bill_of_lading_id',$id)->get()->toArray();
          $isDirectory = File::isDirectory(public_path('container_images/PHOTOS'));
        if ($isDirectory==true) 
            {
              $files_photos = File::files(public_path('container_images/PHOTOS'));
               $validator->after(function ($validator) use ($files_photos)
               {
                 if (empty($files_photos)) {

                $validator->errors()->add('Container_photo', 'Please add photos');

                  }
             return;
         });
        }         
        $validator->after(function ($validator) use ($data)
        {
            if (empty($data)) 
            {

                $validator->errors()->add('Container', 'Add container with this BL');
            }
        return;
    }); 
    }
}