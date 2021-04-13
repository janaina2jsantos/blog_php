<?php

namespace Code\Controllers;
use Code\View\View;
use Code\Models\Categoria;
use Code\Models\Post;
use Code\Models\User;
use Code\DB\Connection;
use Code\Session\Session;
use Code\Session\FlashMessage;
use Code\Validator\Sanitizer;
use Code\Validator\Validator;



class PostsController
{
	public function index()
	{	
		if (!Session::has('user')) {
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo = Connection::getInstance();
		$posts = new Post($pdo);

		$view = new View('admin/posts/index.php');
		$view->posts = $posts->findAll('*', 'id');
		return $view->render();
	}

	public function create()
	{
		if (!Session::has('user')) {
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo = Connection::getInstance();
		$users = new User($pdo);

		$view = new View('admin/posts/create.php');
		$view->users = $users->findAll('id, first_name, last_name', 'id');
		return $view->render();
	}

	public function store()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST') {
			$data = $_POST;
			$data = Sanitizer::sanitizeData($data, Post::$filters);

			if (Validator::validateRequiredFields($data)) {
				FlashMessage::add('danger', 'Preencha todos os campos.');
				return header('Location: ' . URL_BASE . '/posts/create');
			}

			$post = new Post(Connection::getInstance());

			if (!$post->insert($data)) {
				FlashMessage::add('danger', 'Erro ao cadastrar.');
				return header('Location: ' . URL_BASE . '/posts/create');
			}
			
			FlashMessage::add('success', 'Postagem realizada com sucesso.');
			return header('Location: ' . URL_BASE . '/posts');
		}
	}

	public function edit($id)
	{
		if (!Session::has('user')) {
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo   = Connection::getInstance();
		$post  = new Post($pdo);
		$users = new User($pdo);

		$view = new View('admin/posts/edit.php');
		$view->post = $post->find($id);
		$view->users = $users->findAll('id, first_name, last_name', 'id');
		return $view->render();
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST') {
			$data = $_POST;
			$data['id'] = $id;
			$data = Sanitizer::sanitizeData($data, Post::$filters);

			if (Validator::validateRequiredFields($data)) {
				FlashMessage::add('danger', 'Preencha todos os campos.');
				return header('Location: ' . URL_BASE . '/posts/edit/'.$data['id']);
			}

			$post = new Post(Connection::getInstance());

			if (!$post->update($data)) {
				FlashMessage::add('danger', 'Erro ao atualizar.');
				return header('Location: ' . URL_BASE . '/posts');
			}

			FlashMessage::add('success', 'Alteração realizada com sucesso.');
			return header('Location: ' . URL_BASE . '/posts');
		}
	}

	public function delete($id)
	{
		$pdo  = Connection::getInstance();
		$post = new Post($pdo);

		if (!$post->delete($id)) {
			FlashMessage::add('danger', 'Erro ao deletar.');
			return header('Location: ' . URL_BASE . '/posts');
		}

		FlashMessage::add('success', 'Postagem excluída com sucesso.');
		return header('Location: ' . URL_BASE . '/posts');
	}
}