<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="am-u-md-8" role="main">
        <ol class="am-breadcrumb">
            <li><a href="<?php $this->options->siteUrl(); ?>" class="am-icon-home">首页</a></li>
            <?php if (strcmp($this->_archiveType, 'category') == 0): ?>
                <li class="am-active"><?php echo $this->_archiveTitle; ?></li>
            <?php elseif (strcmp($this->_archiveType, 'search') == 0): ?>
                <li class="am-active">包含: <?php echo $this->_archiveTitle; ?> 的文章</li>
            <?php elseif (strcmp($this->_archiveType, 'tag') == 0): ?>
                <li class="am-active"><?php echo $this->_archiveTitle; ?></li>
            <?php elseif (strcmp($this->_archiveType, 'author') == 0): ?>
                <li class="am-active"><?php echo $this->_archiveTitle; ?></li>
            <?php else: ?>
                <li class="am-active">找到的: <?php echo $this->_archiveTitle; ?></li>
            <?php endif; ?>
        </ol>

    <?php if ($this->have()): ?>
    <?php while($this->next()): ?>
    <div class="am-titlebar am-titlebar-default" >
        <h2 class="am-titlebar-title ">
            <?php $this->title() ?>
        </h2>

        <nav class="am-titlebar-nav">
            <button type="button" style="float:right;" class="am-btn am-btn-secondary am-round" onclick="window.location.href='<?php $this->permalink() ?>'">阅读</button>
        </nav>
    </div>
    <?php endwhile; ?>
    <?php else: ?>
        <article class="blog-main">
            <h2 class="am-article-title blog-title"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;', 10, '...', 
        'wrapTag=ul&wrapClass=am-pagination am-pagination-centered&currentClass=am-active'); ?>
    </div><!-- end #main -->

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
