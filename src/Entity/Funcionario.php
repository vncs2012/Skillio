<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Funcionario
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
     *@ORM\Column(type="datetime")
     */
    private $dataDeNascimento;
    /**
     * @ORM\Column(type="datetime")
     */
    private $dataDeEntrada;

    /**
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="funcionarios")
     */
    private $projeto;

    /**
     * @ORM\OneToMany(targetEntity="HoraLancada", mappedBy="funcionario")
     */
    private $horasLancadas;

    public function getTempoNaEmpresa()
    {
        $hoje = new \DateTime();
        $difetenca = $hoje->diff($this->dataDeEntrada);
        return  $difetenca;
    }
    public function getDataDeEntrada()
    {
        return $this->dataDeEntrada;
    }

    public function setDataDeEntrada($dataDeEntrada)
    {
        $this->dataDeEntrada = $dataDeEntrada;
        return $this;
    }

    public function getDataDeNascimento()
    {
        return $this->dataDeNascimento;
    }

    public function setDataDeNascimento($dataDeNascimento)
    {
        $this->dataDeNascimento = $dataDeNascimento;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getProjeto()
    {
        return $this->projeto;
    }

    public function setProjeto($projeto)
    {
        $this->projeto = $projeto;
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
