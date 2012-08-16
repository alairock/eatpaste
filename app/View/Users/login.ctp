<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	<?php
	        echo $this->Form->input('username', array('placeholder' => 'Username', 'label' => false));
	        echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => false));
	    ?>
	<?php echo $this->Form->end(__('Login')); ?>
	</div>
</div>