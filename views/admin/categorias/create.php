
<?php
	require VIEWS_PATH . 'includes/_header.php';
?>
	<style type="text/css">
		.container {
			padding: 30px 170px 120px!important;
		}

		label {
			margin: 30px 0 0;
		}

		.botao {
			margin: 15px 0 0;
		}

		.container {
			padding: 0 170px;
		}

	</style>

	<div class="container">
		<h1 style="margin: 15px 0 30px;">Nova Categoria</h1>
		<hr>
		<form action="<?=URL_BASE;?>/categoria/store" method="POST">
		  	<div class="form-group">
		    	<label>Nome</label>
		    	<input type="text" class="form-control" name="name" required="" />
		  	</div>
		  	<div class="form-group">
		    	<label>Descrição</label>
		    	<textarea class="form-control" rows="5" name="description"></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-primary mb-2 botao">Cadastrar Categoria</button>
		  	<a href="<?=URL_BASE;?>/categorias" class="btn btn-secondary mb-2 botao">Cancelar</a>
		</form>
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>