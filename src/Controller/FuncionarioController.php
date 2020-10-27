<?php

namespace App\Controller;

use App\Entity\Funcionario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FuncionarioController extends AbstractController
{
    /**
     * @Route("/funcionario/mostra/{id}")
     */
    public function mostraAction(Funcionario $funcionario)
    {

        return $this->render('Funcionario/mostra.html.twig', ["funcionario" => $funcionario]);
    }
    /**
     * @Route("/funcionario/novo",methods="GET")
     */
    public function formulario()
    {
        return $this->render("Funcionario/novo.html.twig");
    }
    /**
     * @Route("/funcionario/novo",methods="POST")
     */
    public function cria(Request $request)
    {
        $nome = $request->get("nome");
        $dataDeNascimento = $request->get("dataDeNascimento");
        $dataDeNascimento = new \DateTime($dataDeNascimento);
        $funcionario = new Funcionario();
        $funcionario->setNome($nome);
        $funcionario->setDataDeNascimento($dataDeNascimento);
        $funcionario->setDataDeEntrada(new \DateTime());

        $salvar = $this->getDoctrine()->getManager();
        $salvar->persist($funcionario);
        $salvar->flush();
        return $this->redirect("mostra/" . $funcionario->getId());
    }
}
