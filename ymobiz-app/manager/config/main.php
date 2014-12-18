<?php

$components = array_merge(
    require(dirname(__DIR__) . '/config/components.php'),
    require(dirname(dirname(__DIR__)) . '/common/config/components-local.php')
);

$modules = array_merge(
    require(dirname(__DIR__) . '/config/modules.php'),
    require(dirname(dirname(__DIR__)) . '/common/config/modules-local.php')
);

$params = array_merge(
    require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-core/ymobiz//config/params.php'),
    require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-core/ymobiz/config/params-local.php'),
    require(dirname(__DIR__) . '/config/params.php'),
    require(dirname(__DIR__) . '/config/params-local.php'),
    require(dirname(dirname(__DIR__)) . '/common/config/params-local.php')
);

return [
    'id' => 'ymobiz-manager',
    'name' => 'Ymobiz Manager',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'manager\controllers',
    'bootstrap' => ['log'],
    'components' => $components,
    'modules' => $modules,
    'params' => $params,
];
