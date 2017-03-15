<?php
	namespace App\Form;
	use Cake\Form\Form;
	use Cake\Form\Schema;
	use Cake\Validation\Validator;
	use Cake\NetWork\Email\Email;

	class ContatoForm extends Form{

		/* Essa function cria os campos para o formulario, ja que ele nao tem uma table */

		public function _buildSchema(Schema $schema){
			$schema->addField('nome', 'string');
			$schema->addField('email', 'string');
			$schema->addField('mensagem', 'text');
			return $schema;
		}
		/* Essa function realiza a validacao dos dados inseridos no formulario */

		public function _buildValidator(Validator $validator){
			$validator->add('mensagem', [
				'minLength' => [
					'rule' => ['minLength', 10],
					'message' => 'O email deve conter no minimo 10 caracteres'
				]
			]);
			$validator->notEmpty('nome');
			$validator->notEmpty('email');
			$validator->add('email', [
				'email' => [
					'rule' => ['email'],
					'message' => 'Email invalido, digite um valido'
				]
			]);	
			return $validator;
		}
		/* Realiza o envio do email*/

		public function _execute(array $data){
			/*echo "<pre>";
			var_dump($data);
			exit();*/
			$email = new Email('gmail');
			$email->to('guilherme.cezarini@innovareti.com.br');
			$email->subject('Contato feito pelo site');
			$msg = "Contato feito pelo site 
				Nome: {$data['nome']}
				Email: {$data['email']}
				Mensagem: {$data['mensagem']}
			";
			return $email->send($msg);

		}
	}


?>