<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
?>
<footer>
		<?php wp_footer(); ?>
		<?php wp_nav_menu( array('menu_class' => 'nav_footer entry' )); ?>
			
</footer>
<?php if(!is_user_logged_in()): ?>
<script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	var pageTracker = _gat._getTracker("UA-4540826-2");
	pageTracker._initData();
	_gat._anonymizeIp();
	pageTracker._trackPageview();
	//--><!]]>
</script>
<?php endif; ?>
</body>
</html>