<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
		<ul class="nav nav-list white span3">
		  <li id="homeNav"><a href="#"><i class="icon-home"></i> Home</a></li>
		  <li id="dbNav"><a href="#"><i class="icon-hdd"></i> Database Setup</a></li>
		  <li id="userNav"><a href="#"><i class="icon-user"></i> User Setup</a></li>
		  <li id="completeNav" class="active"><a href="#"><i class="icon-ok icon-white"></i> Complete</a></li>
		</ul>
		<div class="span4">
			<h1>EatPaste!</h1>
			<p>
				Installation complete! You may now login with the username and password that you provided, <?php echo $this->Html->link('here', array('controller' => 'users', 'action' => 'login')); ?>.
			</p>
		</div>
	</div>
</div>