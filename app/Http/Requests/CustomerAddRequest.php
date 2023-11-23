<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddRequest extends FormRequest
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
        
        return [
                'customer_name' => 'required',
                // 'pan' => 'required|max:15||min:8|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
                // 'iec' => 'required|max:15||min:8',
                // 'gstn' => 'required|max:15||min:8',
                // 'contactname.*'=>'required|max:20',
                // 'contactemail.*'=>'required|email',
                // 'contactnumber.*'=>'required|numeric|integer|digits_between:8,13',
                // 'addres.*'=>'required|max:100',
                // 'address.*'=>'required|max:100',
                // 'addresscity.*'=>'required|max:50',
                // 'addresscountry.*'=>'required',
                // 'addresspincode.*'=>'required|numeric|integer|max:999999|min:100000',
                // 'bankname.*'=>'required|max:100',
                // 'bankaddress.*'=>'required|max:100',
                // 'bankcity.*'=>'required|max:50',
                // 'bankcountry.*'=>'required',
                // 'bankpincode.*'=>'required|numeric|integer|max:999999|min:100000',
                 'contactemail.*'=>'nullable|email'
                ];
    }
   public function messages()
   {
       return [
           'customer_name.required' => 'Customer name is required',
           'customer_name.max' => 'Customer name can not be more than 20 character',
           'pan.required' => 'PAN is required',
           'pan.max' => 'PAN should be less then 15 ',
           'pan.min' => 'PAN should not be less then 8 ',
           'pan.regex' => ' PAN number format is Invalid',
           'iec.required' => 'IEC is required',
           'iec.max' => 'IEC should be less then 15 ',
           'iec.min' => 'IEC should not be less then 8 ',
           'gstn.required' => 'GSTN is required',
           'iec.max' => 'GSTN should be less then 15 ',
           'iec.min' => 'GSTN should not be less then 8 ',
           'contactname.*.required' => 'Contact name is required',
           'contactname.*.max' => 'Contact name can not be more than 20 character',
           // 'contactemail.*.required' => 'Contact email is required',
           'contactemail.*.email' => 'Please enter valid email',
           'contactnumber.*.required' => 'Contact number is required',
           'contactnumber.*.numeric' => 'Contact number must be number',
           'contactnumber.*.integer' => 'Contact number must not be float value',
           'contactnumber.*.digits_between' => 'Contact number should be valid number',
           // 'contactnumber.*.min' => 'Contact number must be 8 digits',
           'addres.*.required'=>'First address is required',
           'addres.*.max'=>'First address should not be more than 100 Character',
           'address.*.required'=>'Second address is required',
           'address.*.max'=>'Second address should not be more than 100 Character',
           'addresscity.*.required'=>'City is required',
           'addresscity.*.max'=>'City name should not be more than 50 character',
           'addresscountry.*'=>'Country is required',
           'addresspincode.*.required'=>'Pincode is required',
           'addresspincode.*.min'=>'Pincode must be of 6 digit',
           'addresspincode.*.max'=>'Pincode must be of 6 digit',
           'addresspincode.*.numeric'=>'Pincode should be number',
           'addresspincode.*.integer'=>'Pincode should not be float',
           'bankname.*.required'=>'Bank name is required',
           'bankaddress.*.required'=>'Bank Address is required',
           'bankcity.*.required'=>'Bank city is required', 
           'bankname.*.max'=>'Bank name should not be more than 100 character',
           'bankaddress.*.max'=>'Bank Address should not be more than 100 character',
           'bankcity.*.max'=>'Bank city should not be more than 50 character',
           'bankcountry.*'=>'Bank country is required',
           'bankpincode.*.required'=>'Bank pincode required',
           'bankpincode.*.numeric'=>'Bank pincode should be number',
           'bankpincode.*.integer'=>'Bank pincode should not be float',
           'bankpincode.*.min'=>'Pincode must be of 6 digit',
           'bankpincode.*.max'=>'Pincode must be of 6 digit',

       ];
   }


}
