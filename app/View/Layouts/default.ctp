
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?php echo $this->Html->charset(); ?>
	<title> EatPaste! - EatPaste! Remember (Your code!) </title>

	<link rel="stylesheet/less" type="text/css" href="<?php echo $this->webroot; ?>less/bootstrap.less">
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
			<div class="header-left"><?php echo $this->Html->link('EatPaste!', '/', array('class' => 'title')); ?></div>
			<div class="header-right">
			<?php if (isset($auth) and $auth): ?>
			<img class="border" src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($auth['email']))); ?>.jpg?s=24">
			<?php echo $this->Html->link(__('New'), array('controller' => 'pastes', 'action' => 'add', 'admin' => false));?><?php echo $this->Html->link(__('Pastes'), array('controller' => 'pastes', 'action' => 'index', 'admin' => false));?>
			<?php echo $this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'view', 'admin' => true, $auth['id']));?><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout', 'manager' => false, 'admin' => false)); ?> 
				<?php else : ?>
				<?php echo $this->Html->link(__('New'), array('controller' => 'pastes', 'action' => 'add', 'admin' => false));?><?php echo $this->Html->link(__('Pastes'), array('controller' => 'pastes', 'action' => 'index', 'admin' => false));?>
			<?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login', 'manager' => false, 'admin' => false));
			echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'add', 'manager' => false, 'admin' => false));
				endif; ?>
			</div>
		</div>
	</div>
	<div class="container-fluid white body-page">		
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>

	</div>	
	<div class="footer">
		<div class="footer-inner">
			<div class="footer-left">&copy;<?php echo date('Y'); ?> EatPaste! is a <a href="http://sixteenink.com">sixteenink</a> project | EatPaste! Twitter: <a href="http://twitter.com/alairock">alairock</a></div>
			<div class="footer-right">EatPaste! Remember (Your code!)</div>
			<?php if (isset($auth) and $auth): ?>
		<?php endif; ?>
		</div>
	</div>
<div class="white">	<?php 		echo $this->element('sql_dump');  ?></div>
</body>
</html>
