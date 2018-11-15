<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类: %s'),
            'search'    =>  _t('搜索: %s'),
            'tag'       =>  _t('标签: %s'),
            'author'    =>  _t('作者: %s')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link href="https://cdn.bootcss.com/amazeui/2.7.2/css/amazeui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 请升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<header class="am-topbar ">
    <h1 class="am-topbar-brand">
        <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
    </h1>
    
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
          data-am-collapse="{target: '#doc-topbar-collapse'}">
          <span class="am-sr-only">导航切换</span> 
          <span class="am-icon-bars"></span>
    </button>

    <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
        <li <?php if($this->is('index')): ?> class="am-active"<?php endif; ?> ><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <li <?php if($this->is('page', $pages->slug)): ?> class="am-active"<?php endif; ?> ><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
        <?php endwhile; ?>
    </ul>

    <form class="am-topbar-form am-topbar-left am-form-inline am-topbar-right" 
          method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
      <div class="am-input-group">
        <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="submit">
                <span class="am-icon-search"></span> 
            </button>
        </span>
        <input type="text" class="am-form-field" name="s" />
      </div>
    </form>

    </div>
</header><!-- end #header -->

<div class="am-g am-g-fixed blog-g-fixed">
