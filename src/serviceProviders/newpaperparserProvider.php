<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/6/22
 * Time: 15:28
 */

namespace huoybb\phalconExt\serviceProviders;


use huoybb\phalconExt\myPlugins\myProvider;
use huoybb\phalconExt\webParser\abbaocn;
use huoybb\phalconExt\webParser\hqcknet;
use huoybb\phalconExt\webParser\jdqucom;
use huoybb\phalconExt\webParser\parserManager;

class newpaperparserProvider extends myProvider
{

    protected $parsers = [
        'http://www.hqck.net/'  => hqcknet::class,
        'http://www.abbao.cn/'  => abbaocn::class,
        'http://www.jdqu.com'   => jdqucom::class,
    ];

    public function register($name)
    {
        $parsers = $this->parsers;
        $this->di->setShared($name,function() use($parsers) {
            return new parserManager($parsers);
        });
    }
}