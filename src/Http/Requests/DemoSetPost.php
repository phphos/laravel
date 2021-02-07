<?php

namespace PHPHos\Laravel\Http\Requests;

use PHPHos\Laravel\Http\Requests\Request;

class DemoSetPost extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'avatar' => 'required',
            'nickname' => 'required|max:32',
            'sex' => 'required',
            'birthday' => 'required',
        ];
    }
}
