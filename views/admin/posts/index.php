
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

		.listagem-posts {
			margin-top: 20px;
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
		<h1 style="margin: 15px 0 30px;">Posts</h1>
		<a href="<?=URL_BASE;?>/posts/create" class="btn btn-success mb-2 botao-novo">Adicionar</a>

		<table class="table listagem-posts">
		  	<thead>
			    <tr>
			      	<th scope="col">#</th>
			      	<th scope="col">Título</th>
			      	<th scope="col">Descrição</th>
			      	<th scope="col">Data de Criação</th>
			      	<th scope="col">Ações</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach($this->posts as $post):?>
		  			<tr>
				      	<td class="strong"><?=$post['id']?></td>
				      	<td><?=ucfirst($post['title'])?></td>
				      	<td><?=substr(strip_tags($post['description']), 0, 60) . '...'?></td>
				      	<td><?=date('d/m/Y', $post['created_at'])?></td>
				      	<td class="btn-acoes">
		  					<a href="<?=URL_BASE;?>/posts/edit/<?=$post['id']?>" class="btn btn-sm btn-secondary mb-2 botao">Editar</a>
		  					<form action="<?=URL_BASE;?>/posts/delete/<?=$post['id']?>" method="delete">
		  						<a href="<?=URL_BASE;?>/posts/delete/<?=$post['id']?>" class="btn btn-sm btn-danger mb-2 botao" onclick="return confirm('Tem certeza que deseja deletar esse registro?')">Deletar</a>
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