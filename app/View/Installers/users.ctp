<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
		<ul class="nav nav-list white span3">
		  <li id="homeNav"><a href="#"><i class="icon-home"></i> Home</a></li>
		  <li id="dbNav"><a href="#"><i class="icon-hdd"></i> Database Setup</a></li>
		  <li id="userNav" class="active"><a href="#"><i class="icon-user icon-white"></i> User Setup</a></li>
		  <li id="completeNav"><a href="#"><i class="icon-ok"></i> Complete</a></li>
		</ul>
		<div class="span4">
			<h1>EatPaste!</h1>
			<p>
				<?php echo $this->Form->create('Installer', array('action' => 'complete')); ?>
				<?php echo $this->Form->input('adminUsername', array('label' => false, 'placeholder' => 'Admin Username')); ?>
				<?php echo $this->Form->input('adminPassword', array('label' => false, 'placeholder' => 'Admin Password')); ?>
				<?php echo $this->Form->input('adminEmail', array('label' => false, 'placeholder' => 'you@yourdomain.com')); ?>
				<?php echo $this->Form->submit('Next', array('class' => 'btn btn-success')); ?>
			</p>
		</div>
	</div>
</div>