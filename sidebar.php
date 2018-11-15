<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="am-u-md-4 blog-sidebar" role="complementary">

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="am-panel am-panel-default">
        <header class="am-panel-hd">
            <h3 class="am-panel-title"><?php _e('最新文章'); ?></h3>
        </header>
        <ul class="am-list blog-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>


    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="am-panel am-panel-default">
        <header class="am-panel-hd">
            <h3 class="am-panel-title"><?php _e('文章分类'); ?></h3>
        </header>
        <ul style="margin:8px;" class="am-list blog-list">
            <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list&showCount=true&countTemplate=<span> </span><span class="am-badge am-badge-secondary am-round">%d</span>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowTagsCloud', $this->options->sidebarBlock)): ?>
    <section class="am-panel am-panel-default">
        <header class="am-panel-hd">
            <h3 class="am-panel-title"><?php _e('标签列表'); ?></h3>
        </header>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
        <?php if($tags->have()): ?>
        <ul style="list-style-type:none;margin:5px; padding:8px;">
            <?php while ($tags->next()): ?>
                <li style="display:inline-block;"><a href="<?php $tags->permalink(); ?>" title="<?php $tags->name(); ?>">
                    <span style="margin:2px;padding:8px;" class="am-badge am-badge-secondary am-radius am-text-sm">
                        <?php $tags->name(); ?><sup><?php $tags->count(); ?></sup>
                    </span>
                </a></li>
        <?php endwhile; ?>
        <?php else: ?>
            <li><span class="am-badge am-radius"><?php _e('没有任何标签'); ?></span></li>
        <?php endif; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowFriendLink', $this->options->sidebarBlock)): ?>
    <section class="am-panel am-panel-default">
        <header class="am-panel-hd">
            <h3 class="am-panel-title"><?php _e('友情链接'); ?></h3>
        </header>
        <ul class="am-link-muted">
            <li><a href=""></a></li>
            <li><a href=""></a></li>
        </ul>
    </section>
    <?php endif; ?>

</div><!-- end #sidebar -->
