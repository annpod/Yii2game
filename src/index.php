<?php
// в production режиме эту строку необходимо удалить
defined('YII_DEBUG') or define('YII_DEBUG',true);
// подключаем файл инициализации Yii
require_once('yii');
// создаем экземпляр приложения и запускаем его
$configFile='path/to/config/file.php';
Yii::createWebApplication($configFile)->run();