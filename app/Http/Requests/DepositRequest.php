<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepositRequest extends Request
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
            'deposit' => 'required|integer|max:5000000000|min:1',
        ];
    }

    public function messages()
    {
        return [
            'deposit.required' => '存款金额不可为空',
            'deposit.integer' => '您必须输入整数数值！',
            'deposit.max' => '一次性存款最多能存50亿圆！',
            'deposit.min' => '最少存款额度为1圆！',
        ];
    }
}
