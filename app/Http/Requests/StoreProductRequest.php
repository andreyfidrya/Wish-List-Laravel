<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'productname' => 'required|min:3',
            'category' => 'required|min:3',
            'price' => 'required|min:3|int'
        ];
    }
    public function messages()
    {
        return [
                'required' => 'Поле :attribute пустое', 
                'integer' => 'Поле :attribute может принимать только численные значения.',               
                'min' => [
                    'numeric' => 'Поле :attribute не может содержать менее :min символов.',
                    'file' => 'The :attribute must be at least :min kilobytes.',
                    'string' => 'Поле :attribute содержит менее, чем :min символа.',
                    'array' => 'The :attribute must have at least :min items.'                    
                ]                
        ];        
    }
    public function attributes()
    {
        return [
            'productname' => 'Название товара',
            'category' => 'Категория',
            'price' => 'Стоимость товара'            
        ];
    }
}
