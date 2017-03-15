<?php
namespace App\Model\Entity;
use Cake\Orm\Entity;
class Produto extends Entity{

	public function calculaDesconto(){

		return $this->preco * 0.9;
	}


} 
?>