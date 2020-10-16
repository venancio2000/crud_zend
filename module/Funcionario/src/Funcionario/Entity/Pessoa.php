<?php
namespace Funcionario\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity 
 */
class Pessoa {

    /**
    *@ORM\Id
    *@ORM\GeneratedValue(strategy="AUTO")
    *@ORM\Column(type="integer")
    */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $cpf;

    public function __construct($nome,$email,$cpf) {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;

    }
    public function getId(){
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getCpf() {
        return $this->cpf;
    }
   
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }


}

?>