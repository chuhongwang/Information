<?php
namespace app\common\validate;

use think\Validate;

class Answer extends Validate
{
    protected $rule = [
        "answer|答案" => "require",
        "question_id|所属问题" => "require",
    ];
}
