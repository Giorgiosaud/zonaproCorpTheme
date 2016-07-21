<footer>
	<div class="container-fluid footer-text">
		<div class="col-xs-12 text-center">
			<?php echo get_theme_mod('footer_text_setting','otra')?>
		</div>
	</div>
	<div class="footer-line"></div>
	<?php wp_footer() ?>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			
  ga('create', '<?php the_field('redirect','options')?>', 'auto');
  ga('send', 'pageview');

</script>
</footer>
