
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?php echo $this->Html->charset(); ?>
	<title> EatPaste - Eat. Paste. Remember (Your code!) </title>
	<link rel="stylesheet/less" type="text/css" href="<?php echo $this->webroot; ?>css/styles.less">
	<link type="text/css" rel="stylesheet" href="http://shjs.sourceforge.net/sh_style.css">
	<script src="<?php echo $this->webroot; ?>js/less.js" type="text/javascript"></script>
	<script src="http://shjs.sourceforge.net/sh_main.min.js" type="text/javascript"></script>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body onload="sh_highlightDocument();">
	<div class="header">
		<div class="header-inner">
			<div class="header-left"><?php echo $this->Html->link('Eat Paste!', '/', array('class' => 'title')); ?></div>
			<div class="header-right"><?php echo $this->Html->link('Add New!', array('controller' => 'pastes', 'action' => 'add'), array('class' => 'add-new')); ?>
			<?php if (isset($auth) and $auth):
				echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout', 'manager' => false, 'admin' => false));
				else :
				echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login', 'manager' => false, 'admin' => false));
				endif; ?>
			</div>
		</div>
	</div>
	<div class="content">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>

	<div class="footer">
		<div class="footer-inner">
			<div class="footer-left">&copy;<?php echo date('Y'); ?> sixteenink | <a href="http://twitter.com/alairock">alairock</a></div>
			<div class="footer-right">Eat. Paste. Remember (Your code!)</div>
			<?php if (isset($auth) and $auth): ?>
			<div class="footer-bottom"><a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a> &nbsp;<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">EatPaste!</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://alairock.github.com/eatpaste" property="cc:attributionName" rel="cc:attributionURL">alairock</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License</a>.</div>
		<?php endif; ?>
		</div>
	</div>
<?php 		echo $this->element('sql_dump');  ?>
</body>
</html>
