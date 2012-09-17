<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
		<ul class="nav nav-list white span3">
		  <li id="homeNav"><a href="#"><i class="icon-home"></i> Home</a></li>
		  <li id="dbNav" class="active"><a href="#"><i class="icon-hdd icon-white"></i> Database Setup</a></li>
		  <li id="userNav"><a href="#"><i class="icon-user"></i> User Setup</a></li>
		  <li id="completeNav"><a href="#"><i class="icon-ok"></i> Complete</a></li>
		</ul>
		<div class="span4">
			<h1>EatPaste!</h1>
			<p>
				<?php echo $this->Form->create('Installer', array('action' => 'users')); ?>
				<?php echo $this->Form->input('hostname', array('label' => false, 'placeholder' => 'localhost', 'value' => 'localhost')); ?>
				<?php echo $this->Form->input('dbuser', array('label' => false, 'placeholder' => 'Database Username')); ?>
				<?php echo $this->Form->input('dbpass', array('label' => false, 'placeholder' => 'Database Password')); ?>
				<?php echo $this->Form->input('dbname', array('label' => false, 'placeholder' => 'Database Name')); ?>
				<?php echo $this->Form->input('dbprefix', array('label' => false, 'placeholder' => 'Database Prefix')); ?>
				<?php echo $this->Form->submit('Next', array('class' => 'btn btn-success')); ?>
			</p>
		</div>
	</div>
</div>