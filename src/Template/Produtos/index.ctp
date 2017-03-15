<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Preço</th>	
			<th>Preço com desconto</th>	
			<th>Descrição</th>
			<th>Açoes</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($produtos as $produto){ ?>
			<tr>
				<td><?= $produto['id']; ?></td>
				<td><?= $produto['nome']; ?></td>
				<td><?= $this->Money->format($produto['preco']); ?></td>
				<td><?= $this->Money->format($produto->calculaDesconto()); ?></td>
				<td><?= $produto['descricao']; ?></td>
				<td>
					<?php
						echo $this->Html->Link('Editar',['controller' => 'produtos', 'action' => 'editar', $produto['id']]);
					?>
					<?php
						echo $this->Form->postLink('Excluir',['controller' => 'produtos', 'action' => 'excluir', $produto['id']], ['confirm' => 'Voce tem certeza que deseja excluir esse registro?']);
					?>
					
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<div class="paginator">
	<ul class="pagination">
		<?php
			echo $this->Paginator->prev("Voltar");
			echo $this->Paginator->numbers();
			echo $this->Paginator->next("Avancar");
		?>
	</ul>
</div>

<?php echo $this->Html->Link('Novo Produto', ['controller' => 'produtos', 'action' => 'novo']); ?><br>
<?php echo $this->Html->Link('Logout', ['controller' => 'Users', 'action' => 'logout']); ?>
