<?php
namespace app\common\validate;

use think\Validate;

class Question extends Validate
{
    protected $rule = [
        "question|问题" => "require",
    ];
}
