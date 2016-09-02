<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/6/30
 * Time: 20:38
 */

namespace huoybb\phalconExt\serviceProviders;


use huoybb\phalconExt\myPlugins\myProvider;

class gateProvider extends myProvider
{

    public function register($name)
    {
        $this->di->setShared($name,function(){
            return include configDir('policyGate.php');
        });
    }
}