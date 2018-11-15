<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="am-u-md-8" role="main">
<article class="am-article">
	<div class="am-article-hd">
		<h1 class="am-article-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	</div>
    
    <div class="am-article-bd">
        <?php $this->content(); ?>
    </div>
</article>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
