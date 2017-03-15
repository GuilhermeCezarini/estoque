<h1>Acessar o sistema</h1>
<?php
	echo $this->Form->create();
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->button('Acessar o sistema');
	$this->Form->end();
	$this->Html->Link('Acessar o sistema', ['controller' => 'users', 'action' => 'login']);

?>
