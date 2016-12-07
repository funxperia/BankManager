<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DrawmoneyRequest extends Request
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
            'drawmoney' => 'required|integer|max:5000000|min:1',
        ];
    }

    public function messages()
    {
        return [
            'drawmoney.required' => '取款金额不可为空',
            'drawmoney.integer' => '您必须输入整数数值！',
            'drawmoney.max' => '一次性取款最多能取500万圆！',
            'drawmoney.min' => '最少取款额度为1圆！',
        ];
    }
}
