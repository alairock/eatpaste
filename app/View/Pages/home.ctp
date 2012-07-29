<?php if(empty($_POST)) { unset($_POST); } ?>
<?php if(isset($_POST)) : ?>
	<?php $mysqli = @new mysqli($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpass'], $_POST['dbname']);
		if ($mysqli->connect_errno) :
			echo '<span class="cake-error">Failed to connect! Your settings provided appear to be incorrect!</span>';
			echo '<br><br><a href="' . $this->webroot . '">Try Again</a><br>';
		else: ?>
			<?php $sqlData = $this->element('installSql'); ?>
			<?php $sqlData = str_replace('pastes', $_POST['dbprefix'] . 'pastes', $sqlData); ?>
			<?php pr($sqlData);  ?>
			<?php $mysqli->query($sqlData); ?>
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
	<?php echo '<form method="post" action="' . $this->webroot . '">'; ?>
	<?php echo '<input name="dbhost" placeholder="database host" >'; ?>
	<?php echo '<input name="dbuser" placeholder="database username">'; ?>
	<?php echo '<input name="dbpass" placeholder="database password">'; ?>
	<?php echo '<input name="dbname" placeholder="database name">'; ?>
	<?php echo '<input name="dbprefix" placeholder="database prefix">'; ?>
	<?php echo '<input type="submit" /></form>'; ?>

<?php echo $this->element('checker'); ?>
<?php endif; ?>