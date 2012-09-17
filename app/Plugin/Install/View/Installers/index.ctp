<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
		<ul class="nav nav-list white span3">
		  <li id="homeNav" class="active"><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
		  <li id="dbNav"><a href="#"><i class="icon-hdd"></i> Database Setup</a></li>
		  <li id="userNav"><a href="#"><i class="icon-user"></i> User Setup</a></li>
		  <li id="completeNav"><a href="#"><i class="icon-ok"></i> Complete</a></li>
		</ul>
		<div class="span4">
			<h1>EatPaste!</h1>

			<p>So you want to install EatPaste! pastebin eh? Sweet. Sounds like a killer deal. A paste bin, for you, for free? Yup.</p>

			<?php echo $this->Html->link('Take me there!', array('controller' => 'installers', 'action' => 'database'), array('class' => 'btn btn-success')); ?>
		</div>
	</div>
</div>