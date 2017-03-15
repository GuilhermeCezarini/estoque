<h1>Cadastrar Usuario</h1>
<?php
	echo $this->Form->create($user, ['url' => ['action' => 'salvar']]);
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->button('Cadastrar');
	$this->Form->end();
	$this->Html->Link('Acessar o sistema', ['controller' => 'users', 'action' => 'login']);

?>
