<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $artRule = 'required|regex:/^[a-zA-Z0-9]*$/';
        if (request()->method === "POST") {
            $artRule .= '|unique:App\Models\Product';
        }
        
        return [
            'name' => 'required|string|min:10',
            'art' => $artRule,
            'status' => 'sometimes|in:available,unavailable',
            'data.weight' => 'required|numeric|min:1',
            'data.price' => 'required|numeric|min:1',
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array
     */
    public function messages() {
        return [
            'required' => 'Поле обязательно к заполнению',
            'numeric' => 'Вводимое значение должно быть числом',
            'name.min' => 'Наеменование товара не должно быть меньше 10 символов',
            'art.regex' => 'Поле должно состоять только из латинских символов и цифр',
            'art.unique' => 'Данный артикул уже был введен для другого товара',
            'data.weight.min' => 'Вес не можеть быть равен 0',
            'data.price.min' => 'Cстоимость не можеть быть равна 0',
        ];
    }
}
