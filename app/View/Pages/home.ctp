<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
<?php App::uses('AuthComponent', 'Controller/Component'); ?>
<?php if(empty($_POST)) { unset($_POST); } ?>
<?php if(isset($_POST) && $_POST['username'] != '') : ?>
	<?php $mysqli = @new mysqli($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpass'], $_POST['dbname']);
		if ($mysqli->connect_errno) :
			echo '<span class="notice">Failed to connect! Your settings provided appear to be incorrect!</span>';
			echo '<br><br><a href="' . $this->webroot . '">Try Again</a><br>';
		else: ?>
			<?php $sqlData = $this->element('installSql'); ?>
			<?php $sqlData = str_replace('pastes', $_POST['dbprefix'] . 'pastes', $sqlData); ?>
			<?php $sqlData = str_replace('users', $_POST['dbprefix'] . 'users', $sqlData); ?>
			<?php $sqlData = str_replace('paste_username', $_POST['username'], $sqlData); ?>
			<?php $sqlData = str_replace('paste_password', AuthComponent::password($_POST['password']), $sqlData); ?>
			<div class="body-block">
				<?php pr($sqlData);  ?>
			</div>
			<?php $mysqli->multi_query($sqlData); ?>
			<?php $mysqli->close(); ?>
			<?php $currentDir = getcwd();
				$root = str_replace('/app/webroot', '', $currentDir);
				$dbFile = $root . '/database.php.default'; 
			?>
			<?php $dbFile = file_get_contents($dbFile); ?>
			<?php $dbFile = str_replace('seskyHost', $_POST['dbhost'], $dbFile); ?>
			<?php $dbFile = str_replace('seskyUser', $_POST['dbuser'], $dbFile); ?>
			<?php $dbFile = str_replace('seskyPass', $_POST['dbpass'], $dbFile); ?>
			<?php $dbFile = str_replace('seskyName', $_POST['dbname'], $dbFile); ?>
			<?php $dbFile = str_replace('seskyPrefix', $_POST['dbprefix'], $dbFile); ?>
			<?php file_put_contents($root . '/database.php', $dbFile) ?>
			<span class="notice success">Installation Complete! <a href="<?php echo $this->webroot; ?>"> Click Here</a> to start.</span>
		<?php endif; ?>
		
<?php else : ?>
<?php if (isset($_POST) && $_POST['username'] == ''): ?>
	<span class="notice">The Username cannot be empty!</span>
<?php endif; ?>
		<h1>Installation of Eat Paste!</h1>
		<h3>Enter your database credentials!</h3>
		<p><?php echo '<form method="post" action="' . $this->webroot . '">'; ?></p>
		<p><?php echo '<input name="dbhost" placeholder="Host" >'; ?></p>
		<p><?php echo '<input name="dbuser" placeholder="Username">'; ?></p>
		<p><?php echo '<input name="dbpass" placeholder="Password">'; ?></p>
		<p><?php echo '<input name="dbname" placeholder="Name">'; ?></p>
		<p><?php echo '<input name="dbprefix" placeholder="Prefix">'; ?></p>
	</div>
</div>
<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container no-border-top">
		<h3>Set Admin Username and Password!</h3>
		<p><?php echo '<input name="username" placeholder="Admin Username">'; ?></p>
		<p><?php echo '<input name="password" placeholder="Admin Password">'; ?></p>
		<p><?php echo '<input type="submit" class="btn btn-success" /></form>'; ?></p>
	</div>
</div>
<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
<?php echo $this->element('checker'); ?>
<div class="footer-bottom"><a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a> &nbsp;<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">EatPaste!</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://alairock.github.com/eatpaste" property="cc:attributionName" rel="cc:attributionURL">alairock</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License</a>.</div>
<?php endif; ?>

</div>
</div>