<?php
namespace common\rbac;

use yii\rbac\Rule;

class AdminRule extends Rule 
{
    public $name = 'isAdmin';

    public function execute($user, $item, $params) 
    {
        
    }
}