<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
	<?php //echo $this->Html->link('Add New!', array('controller' => 'pastes', 'action' => 'add'), array('class' => 'btn btn-success pull-right')); ?>
	<?php
	foreach ($pastes as $paste): ?>
	<div class="snippet">
		<div class="snippet-header"><?php echo $this->Html->link(h($paste['Paste']['title']), array('action' => 'view', $paste['Paste']['id'])); ?> | <?php echo h($paste['Paste']['type']); ?><span class="pull-right"><?php echo date('M d, Y h:i:s a', strtotime(h($paste['Paste']['created']))); ?></span></div>
		<div class="snippet-body"><?php echo '<pre class="sh_' . $paste['Paste']['type'] . ' white">' . $this->TrimThree->trim(h($paste['Paste']['paste_data'])) . '</pre>'; ?></div>
 		<?php if (isset($auth) and $auth): ?>
		<div class="snippet-footer">
			<span class="pull-right">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paste['Paste']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', 'admin' => true, $paste['Paste']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 'admin' => true, $paste['Paste']['id']), null, __('Are you sure you want to delete # %s?', $paste['Paste']['id'])); ?>
			</span>
		</div>
		<?php endif; ?> 
	</div>
		


	<?php endforeach; ?>


	<div class="paging">
	<?php
		echo $this->Paginator->next('< ' . __('older'), array('class' => 'btn'), null, array('class' => 'hideme'));
		
		echo $this->Paginator->prev(__('newer') . ' >', array('class' => 'btn'), null, array('class' => 'hideme'));
	?>&nbsp;<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}'))); ?>
	</div>

	</div>
</div>
<script type="text/javascript" src="http://shjs.sourceforge.net/lang/sh_<?php echo $paste['Paste']['type']; ?>.js"></script>