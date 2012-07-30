
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?php echo $this->Html->charset(); ?>
	<title> EatPaste - Eat. Paste. Remember (Your code!) </title>
	<link rel="stylesheet/less" type="text/css" href="<?php echo $this->webroot; ?>css/styles.less">
	<script src="<?php echo $this->webroot; ?>js/less.js" type="text/javascript"></script>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('twilight');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
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
		</div
	</div>

</body>
</html>
