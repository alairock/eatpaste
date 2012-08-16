
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?php echo $this->Html->charset(); ?>
	<title> EatPaste - Eat. Paste. Remember (Your code!) </title>

	<link rel="stylesheet/less" type="text/css" href="<?php echo $this->webroot; ?>less/bootstrap.less">
	<link rel="stylesheet/css" type="text/css" href="<?php echo $this->webroot; ?>css/sh_styles.css">	
	<script src="<?php echo $this->webroot; ?>js/less.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot; ?>js/sh_main.min.js" type="text/javascript"></script>
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
			<div class="header-right">
			<?php if (isset($auth) and $auth): ?>
			<img class="border" src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim('skyler@sixteenink.com'))); ?>.jpg?s=24">
			<?php echo $this->Html->link(__('New'), array('controller' => 'pastes', 'action' => 'add'));?><?php echo $this->Html->link(__('Account'), '#');?><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout', 'manager' => false, 'admin' => false)); ?> 
				<?php else :
				echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login', 'manager' => false, 'admin' => false));
				endif; ?>
			</div>
		</div>
	</div>
	<div class="container-fluid white">
		<div class="row-fluid">
			<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
			<div class="span8 grayLighter">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="footer-inner">
			<div class="footer-left">&copy;<?php echo date('Y'); ?> sixteenink | <a href="http://twitter.com/alairock">alairock</a></div>
			<div class="footer-right">Eat. Paste. Remember (Your code!)</div>
			<?php if (isset($auth) and $auth): ?>
		<?php endif; ?>
		</div>
	</div>
<?php 		echo $this->element('sql_dump');  ?>
</body>
</html>
