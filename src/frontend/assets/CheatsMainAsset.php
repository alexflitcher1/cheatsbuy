<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class CheatsMainAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
        'css/cheats-main.css',
		'//fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap',
		'//fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap',
		'//fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap',
    ];
	public $js = [
		'js/index.js',
		'js/modal.js',
	];
	public $img = [
		'favicon' =>  'favicon.ico',
	];
	public $depends = [
	];
}