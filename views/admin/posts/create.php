
<?php
	require VIEWS_PATH . 'includes/_header.php';
?>
	<style type="text/css">
		.container {
			padding: 30px 170px 120px!important;
		}

		label {
			margin: 25px 0 0;
		}

		.botao {
			margin: 15px 0 0;
		}

		.container {
			padding: 0 170px;
		}
		.botoes-submit {
			margin-top: 15px;
		}
	</style>

	<div class="container">
		<div class="col-md-12">
			<?php require VIEWS_PATH . 'includes/_messages.php';?>
		</div>
		<h1 style="margin: 15px 0 30px;">Novo Post</h1>
		<hr>
		<form action="<?=URL_BASE;?>/posts/store" method="POST">
		  	<div class="form-group">
		    	<label>Título</label>
		    	<input type="text" class="form-control" name="title" autocomplete="off" />
		  	</div>
		  	<div class="form-group">
		    	<label>Descrição</label>
		    	<input type="text" class="form-control" name="description" />
		  	</div>
		  	<div class="form-group">
		    	<label>Conteúdo</label>
		    	<textarea class="form-control" rows="5" name="content"></textarea>
		  	</div>
		  	<div class="form-group">
		    	<label>Slug</label>
		    	<input type="text" class="form-control" name="slug" autocomplete="off" />
		  	</div>
		  	<div class="form-group">
		    	<label>Tipo</label>
		    	<select class="form-control" name="type">
			      	<option selected="selected" disabled="">Selecione</option>
		    		<option value="post">Post</option>
		    		<option value="page">Página</option>
		    	</select>
		  	</div>
		  	<div class="form-group">
		    	<label>Autor</label>
		    	<select class="form-control" name="user_id" required="true">
			      	<option selected="selected" disabled="">Selecione</option>
			    	<?php foreach ($this->users as $user):?>
			      		<option value="<?=$user['id']?>"><?=ucfirst($user['first_name']) .' '. ucfirst($user['last_name'])?></option>
			  		<?php endforeach;?>
		    	</select>
		  	</div>
		  	<div class="form-group botoes-submit">
		  		<button type="submit" class="btn btn-primary mb-2 botao">Cadastrar Post</button>
		  		<a href="<?=URL_BASE;?>/posts" class="btn btn-secondary mb-2 botao">Cancelar</a>
		  	</div>
		</form>
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>