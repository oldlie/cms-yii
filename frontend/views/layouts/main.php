<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode('知人甄选') ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="web-nav">
    <div class="container clearfix">
        <a href="index.html" class="web-logo"><img src="images/logo.jpg" alt=""></a>
        <ul class="nav-ul clearfix">
            <li><a href="index.html">登录</a>|<a href="#">注册</a></li>
        </ul>
        <ul class="nav-ul clearfix">
            <li><?=Html::a('首页', ['site/index'], ['class' => 'acur'])?></li>
            <li><?=Html::a('产品', ['product/index'])?></li>
            <li><?=Html::a('资讯', ['news/index'])?></li>
            <li><a href="#">联系我们</a></li>
        </ul>
    </div>
</div>

<?= $content ?>

<div class="web-footer">
    <div class="container clearfix">
        <img class="footer-logo" src="images/logo2.png">
        <ul>
            <li class="phone400">
                <span>全国统一咨询电话</span>
                <span class="bigfont">4000-688-710</span>
            </li>
            <li>地址：江苏省苏州市相城区阳澄湖镇朱家舍</li>
            <li>© 2005-2017 苏州胡农蟹业有限公司&nbsp;&nbsp;&nbsp;苏ICP备14024356号</li>
            <li>
                <a href="#">首页</a> |
                <a href="#">产品详情</a> |
                <a href="#">品牌资讯</a> |
                <a href="#">招商合作</a> |
                <a href="#">联系我们</a>
            </li>
        </ul>
        <div class="weixin">
            <img src="images/weixin.png">
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
