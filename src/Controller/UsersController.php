<?php
	namespace App\Controller;
	use Cake\ORM\TableRegistry;
	use Cake\Event\Event;
	class UsersController extends AppController {
		public function beforeFilter(Event $event){
			parent::beforeFilter($event);
			$this->Auth->allow(['adicionar', 'salvar']);

		}
		public function index(){

		}
		public function adicionar(){
			$userTable = TableRegistry::get('Users');
			$user = $userTable->newEntity();
			$this->set('user', $user);
			
		}
		public function salvar(){
			$userTable = TableRegistry::get('Users');
			$user = $userTable->newEntity($this->request->data());
			if($userTable->save($user)){
				$msg ="Usuario salvo com sucesso";
				$this->Flash->set($msg,['element' => 'success']);

			}else{
				$msg = 'Erro ao salvar usuario';
				$this->Flash->set($msg,['element' => 'error']);
			}

			$this->redirect('users/login');
		}
		public function login(){

			if($this->request->is('post')){
				$user = $this->Auth->identify();
				if($user){
					$this->Auth->setUser($user);
					return $this->redirect($this->Auth->redirectUrl());
				}else{
					$this->Flash->set('Usuario ou senha invalida', ['element' => 'error']);
				}
			}
		}
		public function logout(){
			$this->redirect($this->Auth->logout());
		}
	}
?>