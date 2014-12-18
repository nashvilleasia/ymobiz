<?php

use yii\helpers\Markdown;
use yii\apidoc\helpers\ApiMarkdown;
use cebe\markdown\GithubMarkdown;

$this->registerCssFile('/home/web/css/docs/css/markdown-css-themes/markdown7.css');

echo '<div class="container">';
echo Markdown::process($this->render('guide/'.$page),'gfm');
echo '</div>';

?>