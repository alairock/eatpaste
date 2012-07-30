<div class="body-block">
<h3><?php echo h($paste['Paste']['title']); ?> - <?php echo h($paste['Paste']['type']); ?> - <?php echo h($paste['Paste']['created']); ?></h3>
<h4><?php echo $this->Html->link(h($paste['Paste']['short_url']), $paste['Paste']['short_url']); ?></h4>
<?php echo $this->Geshi->highlight('<pre lang="' . $paste['Paste']['type'] . '">' . h($paste['Paste']['paste_data']) . '</pre>'); ?>

</div>	