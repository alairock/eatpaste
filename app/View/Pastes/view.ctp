<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
		<div class="snippet">
		<div class="snippet-header"><?php echo $this->Html->link(h($paste['Paste']['title']), array('action' => 'view', $paste['Paste']['id'])); ?> | <?php echo h($paste['Paste']['type']); ?><span class="pull-right"><?php echo date('M d, Y h:i:s a', strtotime(h($paste['Paste']['created']))); ?></span></div>
		<div class="snippet-body">
			<span class="pull-right">Google ShortUrl: <?php echo $this->Html->link(h($paste['Paste']['short_url']), $paste['Paste']['short_url']); ?></span>
		<?php echo '<pre class="sh_' . $paste['Paste']['type'] . ' white">' . h($paste['Paste']['paste_data']) . '</pre>'; ?></div>
	</div>
	</div>	
</div>

<script type="text/javascript" src="http://shjs.sourceforge.net/lang/sh_<?php echo $paste['Paste']['type']; ?>.js"></script>