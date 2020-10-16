<?php
namespace Funcionario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Funcionario\Entity\Pessoa;

class IndexController extends AbstractActionController {

	public function IndexAction() {

		$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$repositorio = $entityManager->getRepository('Funcionario\Entity\Pessoa');

		$pessoa = $repositorio->findAll();
        $view_params = array(
			'pessoa' => $pessoa

		);
        return new ViewModel($view_params);
		
	}

	public function cadastrarAction(){

		if($this->request->isPost()){
			$nome = $this->request->getPost('nome');
			$email = $this->request->getPost('email');
			$cpf = $this->request->getPost('cpf');

			$pessoa = new Pessoa($nome,$email,$cpf);

			$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

			$entityManager->persist($pessoa);

			$entityManager->flush();

			$this->flashMessenger()->addSuccessMessage('Funcionario Cadastrado');

			return $this->redirect()->toUrl('/Index/Index');
		}
		return new ViewModel();
	}

	public function removerAction(){
		$id = $this->params()->fromRoute('id');
		
		if($this->request->isPost()){

			$id = $this->request->getPost('id');

			$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
			$repositorio = $entityManager->getRepository('Funcionario\Entity\Pessoa');

			$pessoa = $repositorio->find($id);

			$entityManager->remove($pessoa);
			$entityManager->flush();

			return $this->redirect()->toUrl('/Index/Index');


		}
		return new ViewModel([id => $id]);
	}
	public function editarAction() { 

		$id = $this->params()->fromRoute('id');

		if(is_null($id)) {
			$id = $this->request->getPost('id');
		}

		$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$repositorio = $entityManager->getRepository('Funcionario\Entity\Pessoa');

		$pessoa = $repositorio->find($id);

		if($this->request->isPost()) {
			$pessoa->setNome($this->request->getPost('nome'));
			$pessoa->setEmail($this->request->getPost('email'));
			$pessoa->setCpf($this->request->getPost('cpf'));
			
			$entityManager->persist($pessoa);
			$entityManager->flush();

			$this->flashMessenger()->addMessage('Funcionario alterado com sucesso');

			return $this->redirect()->toUrl('/Index/Index');
		}

		$view_params = ['pessoa' => $pessoa];
        return new ViewModel($view_params);

		
	}
}


?>