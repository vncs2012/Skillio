<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Projeto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="Funcionario", mappedBy="projeto")
     */
    private $funcionarios;

    /**
     * @ORM\OneToMany(targetEntity="HoraLancada", mappedBy="projeto")
     */
    private $horasLancadas;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getFuncionarios()
    {
        return $this->funcionarios;
    }

    public function setFuncionarios($funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }


    public function getHorasLancadas()
    {
        return $this->horasLancadas;
    }

    public function setHorasLancadas($horasLancadas)
    {
        $this->horasLancadas = $horasLancadas;
    }
}
