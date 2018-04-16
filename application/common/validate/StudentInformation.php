<?php
namespace app\common\validate;

use think\Validate;

class StudentInformation extends Validate
{
    protected $rule = [
        "id_number|身份证号" => "",
        "phone|联系电话" => "",
    ];
}
