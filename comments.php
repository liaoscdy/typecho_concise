<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function get_gravatar( $email, $s = 48, $d = 'wavatar', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        echo $url;
}
?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li class="am-comments-list">
    <div id="<?php $comments->theId(); ?>">
        <img src="<?php get_gravatar($comments->mail); ?>" class="am-comment-avatar am-margin-right-sm" width="48" height="48"/>
        <?php $comments->content(); ?>
        <div>
            <cite class=""><?php $comments->author(); ?></cite>
            <a class="am-margin-left-xs" href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            <span class="am-margin-left-sm"><?php $comments->reply(); ?></span>
            <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
        </div>
    </div>
<?php if ($comments->children) { ?>
    <div>
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />

    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;', 10, '...', 
        'wrapTag=ul&wrapClass=am-pagination am-pagination-centered&currentClass=am-active'); ?>

    <?php endif; ?>
    <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
        <p id="response" class="am-text-xl"><?php _e('添加新评论'); ?>
            <?php if($this->user->hasLogin()): ?>
                <a class="am-text-default" href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. 
                <a class="am-text-default" href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
            <?php endif; ?>
        </p>

        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="am-form">
            <?php if(!$this->user->hasLogin()): ?>
            <div class="am-input-group am-margin-vertical-sm">
                <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
                <input type="text" name="author" id="author" class="am-form-field" 
                       placeholder="* 称呼" value="<?php $this->remember('author'); ?>" required />

                <span class="am-input-group-label"><i class="am-icon-envelope am-icon-fw"></i></span>
                <input type="email" name="mail" id="mail" class="am-form-field" 
                       placeholder="* 邮件" value="<?php $this->remember('mail'); ?>" 
                       <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
            </div>
            <div class="am-input-group am-margin-vertical-sm">
                <span class="am-input-group-label"><i class="am-icon-link am-icon-fw"></i></span>
                <input type="url" name="url" id="url" class="am-form-field" 
                       placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"
                       <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            </div>

            <?php endif; ?>

            <div class="am-form-group">
                <label for="doc-ta-1"><?php _e('评论内容: '); ?></label>
                <textarea class="textarea" name="text" rows="8" cols="50" id="doc-ta-1"><?php $this->remember('text'); ?></textarea>
            </div>

            <p>
                <button type="submit" class="am-btn am-btn-primary"><?php _e('提交评论'); ?></button>
            </p>
        </form>
    </div>

    <?php else: ?>
    <p class="am-text-xl am-form-help"> <?php _e('评论已关闭'); ?></p>
    <?php endif; ?>
</div>
