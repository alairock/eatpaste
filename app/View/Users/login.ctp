<div class="body-block">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<?php
        echo $this->Form->input('username', array('placeholder' => 'Username', 'label' => false));
        echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => false));
    ?>
<?php echo $this->Form->end(__('Login')); ?>
</div>