<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormOneRequest extends FormRequest
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
        return $this->rules =[
            'name' => 'required',
            'date_of_birth'=> 'required|date',
//            'email' => "required|string|email|max:191|unique:event_ones,NULL,$this->uuid,uuid",
            'email'=> "required|unique:event_ones,email,NULL,$this->uuid,uuid,1",
            'phone'=> "required|string|max:30|unique:event_ones,phone,NULL,$this->uuid,uuid,1",
            'ip_address' => 'nullable',

        ];

        return $this->rules;
    }

    public function attributes()
    {
        return [

            'name'=>'Nome',
            'date_of_birth'=>'Data de Nascimento',

        ];
    }
}
