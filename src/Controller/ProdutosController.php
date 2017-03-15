<?php
	namespace App\Controller;
	use Cake\ORM\TableRegistry;

	class ProdutosController extends AppController{
		public $paginate = [
			"limit" => 5
		];
		public function initialize(){
			parent::initialize();
			$this->loadComponent("Paginator");
		}
		public function index() {
			$produtosTable = TableRegistry::get('produtos');
			$produtos = $produtosTable->find('all');
			$this->set('produtos', $this->paginate($produtos));
		}

		public function novo()	{
			$produtosTable = TableRegistry::get('produtos');
			$produto = $produtosTable->newEntity();
			$this->set('produto', $produto);
		}

		public function salvar (){
			$produtosTable = TableRegistry::get('produtos');
			$produto = $produtosTable->newEntity($this->request->data());
			if(!$produto->errors() && $produtosTable->save($produto)){
				$msg = "Produto salvo com sucesso";
				$this->Flash->set($msg,['element' => 'success']);
				$this->redirect('produtos/index');
			}else{
				$msg = "Erro ao salvar";
				$this->Flash->set($msg,['element' => 'error']);
				$this->set('produto', $produto);
				$this->render('novo');
			}
			
			
		}

		public function editar ($id){
			$produtosTable = TableRegistry::get('produtos');
			$produto = $produtosTable->get($id);
			$this->set('produto', $produto);
			$this->render('novo');
		}

		public function excluir($id){
			$produtosTable = TableRegistry::get('produtos');
			$produto = $produtosTable->get($id);
			if($produtosTable->delete($produto)){
				$msg = "Produto excluido com sucesso";
				$this->Flash->set($msg, ['element' => 'error']);
			}else{
				$msg = "Nao foi possivel excluir o produto";
				$this->Flash->set($msg);
			}
			$this->redirect("produtos/index");
		}


	}
?>