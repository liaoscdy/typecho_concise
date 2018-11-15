<?php
/**
 * 基于 AmazeUi 的 Typecho主题, 简洁, 轻便.
 * 
 * @package Concise Blog Theme
 * @author Shichao Liao
 * @version 0.1.1
 * @link https://www.liaoshichao.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="am-u-md-8" role="main">
	<?php while($this->next()): ?>
        <article class="blog-main">
        	<h3 class="am-article-title blog-title">
        		<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
      		</h3>
      		<h4 class="am-article-meta blog-meta">
      			创建于: <?php $this->date(); ?> | 分类: <?php $this->category(' , '); ?> | <a href="<?php $this->permalink() ?>#comments"><span id = "sourceId::<?php echo $this->cid;?>" class = "cy_cmt_count" ></span> 条评论</a>
      		</h4>
            <div class="am-g blog-content" itemprop="articleBody">
            	<div class="am-u-sm-12">
            		<?php 
            		echo false !== $more && false !== strpos($this->text, '<!--more-->') ?
        				$this->excerpt . "<button type=\"button\" style=\"float:right;\" class=\"am-btn am-btn-default am-round\" onclick=\"window.location.href='{$this->permalink}'\">阅读全文</button>" : 
        				$this->content; 
        			?>
        		</div>
            </div>
        </article>
        <hr class="am-article-divider blog-hr">
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;', 10, '...', 
    	'wrapTag=ul&wrapClass=am-pagination am-pagination-centered&currentClass=am-active'); ?>
</div><!-- end #main-->

<script 
  id="cy_cmt_num" src="http://changyan.sohu.com/upload/plugins/plugins.list.count.js?clientId=cytUK0G45">
</script>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
