<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/6/6
 * Time: 17:08
 */

namespace huoybb\phalconExt\serviceProviders;


use huoybb\phalconExt\eventsHandlers\myTestEventHandler;
use huoybb\phalconExt\myPlugins\myEventManager;
use huoybb\phalconExt\myPlugins\myProvider;

class eventsManagerProvider extends myProvider
{

    public function register($name)
    {
        $this->di->setShared($name,function(){
            $eventsManager = new myEventManager();
            $eDomain = \ConfigFacade::getService()->application->eventPrefix;
            $eventsManager->register($eDomain,[
                myTestEventHandler::class,
            ]);
            return $eventsManager;
        });
    }
}