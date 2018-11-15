<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!-- end #body -->

<footer>
  <div id="footer">
  	<div class="line">
    	<span></span>
    	<div class="author"></div>
  	</div>
  	<section class="info">
    	<p> <?php $this->options->title(); ?></p>
    	<p> <?php $this->options->description() ?></p>
  	</section>

    <div id="foot_social">
     <ul class="amz-social">
        <a href="https://github.com/liaoscdy" class="am-icon-btn am-icon-github"></a>
        <a href="https://twitter.com/ShichaoLiao" class="am-icon-btn am-icon-twitter"></a>
        <a href="##" class="am-icon-btn am-icon-cny"></a>
     </ul>
    </div>

    <p class="copyright">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('Powered by <a href="http://www.typecho.org">Typecho</a>'); ?>. <br>
    <a href="http://www.miibeian.gov.cn">
      <img src="<?php $this->options->themeUrl('img/beian.png'); ?>">
      蜀ICP备15018073号-1
    </a>
    </p>
  </div>
</footer> <!-- end #footer -->

<?php $this->footer(); ?>
<script src="https://cdn.bootcss.com/amazeui/2.7.2/js/amazeui.min.js"></script>

<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
          <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
</div>

</body>
</html>
