<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="am-u-md-8" role="main">
    <ol class="am-breadcrumb">
        <li><a href="<?php $this->options->siteUrl(); ?>" class="am-icon-home">首页</a></li>
        <li><?php $this->category(' , '); ?></li>
        <li class="am-active"><?php $this->title() ?></li>
    </ol>
    
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
            <p class="am-article-meta">
                <span class="am-icon-calendar-plus-o"><?php echo " "; ?><?php $this->date(); ?></span>
                 <?php echo " | "; ?><span class="am-icon-folder"></span><?php echo " "; ?><?php $this->category(','); ?>
            </p>
        </div>
        <hr class="am-article-divider"></hr>
        <div class="am-article-bd">
            <?php $this->content(); ?>
        </div>
    </article>

    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
