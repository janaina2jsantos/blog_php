
<?php
	require VIEWS_PATH . 'includes/_header.php';
?>
	
	<style type="text/css">
		.container {
			padding: 30px 170px 120px!important;
		}
		
		.btn-acoes {
			display: flex;
		}
		.btn-acoes form a {
			margin-left: 5px;
		}
		.strong {
			font-weight: bold;
			color: #5e6469;
		}

	</style>

	<div class="container">
		<div class="col-md-12">
			<?php require VIEWS_PATH . 'includes/_messages.php';?>
		</div>
		<h1 style="margin: 15px 0 30px;">Categorias</h1>
		<a href="<?=URL_BASE;?>/categorias/create" class="btn btn-success mb-2 botao">Adicionar</a>
		<table class="table">
		  	<thead>
			    <tr>
			      	<th scope="col">#</th>
			      	<th scope="col">Nome</th>
			      	<th scope="col">Descrição</th>
			      	<th scope="col">Data de Criação</th>
			      	<th scope="col">Ações</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($this->categorias as $ctg):?>
		  			<tr>
				      	<td class="strong"><?=$ctg['id']?></td>
				      	<td><?=$ctg['name']?></td>
				      	<td><?=substr(strip_tags($ctg['description']), 0, 60) . '...'?></td>
				      	<td><?=date('d/m/Y', $ctg['created_at'])?></td>
				      	<td class="btn-acoes">
		  					<a href="<?=URL_BASE;?>/categorias/edit/<?=$ctg['id'];?>" class="btn btn-sm btn-secondary mb-2 botao">Editar</a>
		  					<form action="<?=URL_BASE;?>/categorias/delete/<?=$ctg['id']?>" method="delete">
		  						<a href="<?=URL_BASE;?>/categorias/delete/<?=$ctg['id']?>" class="btn btn-sm btn-danger mb-2 botao" onclick="return confirm('Tem certeza que deseja deletar esse registro?')">Deletar</a>
		  					</form>
				      	</td>
			    	</tr>
		  		<?php endforeach;?>
		 	 </tbody>
		</table>
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>