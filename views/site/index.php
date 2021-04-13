
<?php
	require VIEWS_PATH . 'includes/_header.php';
?>
	
	<style type="text/css">

		.container {
			padding: 30px 170px 120px!important;
		}

	</style>

	<div class="container">
		<h1 style="margin: 15px 0 30px;">Home do Blog</h1>
		<a href="<?=URL_BASE;?>/auth/login" class="btn btn-success mb-2 botao">Login</a>	
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>