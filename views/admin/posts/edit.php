
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
		<div class="col-md-12">
			<?php require VIEWS_PATH . 'includes/_messages.php';?>
		</div>
		<h1 style="margin: 15px 0 30px;">Editar Post</h1>
		<hr>
		<form action="<?=URL_BASE;?>/posts/update/<?=$this->post['id']?>" method="POST">
		  	<div class="form-group">
		    	<label>Título</label>
		    	<input type="text" class="form-control" name="title" value="<?=$this->post['title']?>" />
		  	</div>
		  	<div class="form-group">
		    	<label>Descrição</label>
		    	<input type="text" class="form-control" name="description" value="<?=$this->post['description']?>" />
		  	</div>
		  	<div class="form-group">
		    	<label>Conteúdo</label>
		    	<textarea class="form-control" rows="5" name="content"><?=$this->post['content']?></textarea>
		  	</div>
		  	<div class="form-group">
		    	<label>Slug</label>
		    	<input type="text" class="form-control" name="slug" value="<?=$this->post['slug']?>" />
		  	</div>
		  	<div class="form-group">
		    	<label>Tipo</label>
		    	<select class="form-control" name="type" required="true">
			      	<option selected="selected" disabled="">Selecione</option>
		    		<option value="post" <?php if($this->post['type'] == 'post'):?> selected="selected" <?php endif;?>>Post</option>
		    		<option value="page" <?php if($this->post['type'] == 'page'):?> selected="selected" <?php endif;?>>Página</option>
		    	</select>
		  	</div>
		  	<div class="form-group">
		    	<label>Autor</label>
		    	<select class="form-control" name="user_id" required="true">
			      	<option selected="selected" disabled="">Selecione</option>
			    	<?php foreach ($this->users as $user):?>
			      		<option value="<?=$user['id']?>"
			      			<?php if($user['id'] == $this->post['user_id']):?>
			      				selected
			      			<?php endif;?>
			      			><?=ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])?></option>
			  		<?php endforeach;?>
		    	</select>
		  	</div>
		  	<button type="submit" class="btn btn-primary mb-2 botao">Salvar Post</button>
		  	<a href="<?=URL_BASE;?>/posts" class="btn btn-secondary mb-2 botao">Cancelar</a>
		</form>
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>