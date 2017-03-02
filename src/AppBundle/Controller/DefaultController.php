<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/hello/{prenom}/age/{age}", name="hello")
     */
    public function helloAction($prenom, $age)
    {
        $m_prenom = strtoupper($prenom);

        return $this->render('default/hello.html.twig',
            ['nom' => $m_prenom,
             'age' => $age
            ]);
    }

    /**
     * _getSource description
     * @param  string $fichier Le fichier de données
     * @return JSON
     */
    private function _getSource($fichier)
    {
        $root = realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR;
        $friends = file_get_contents($root."app/Resources/data/$fichier.json");
        $friendsList = json_decode($friends);

        return $friendsList->amis;
    }
    /**
     * @Route("/liste-amis", name="listeAmis")
     */
    public function listeAmisAction(Request $request)
    {
        $root = realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR;
        $friends = file_get_contents($root."app/Resources/data/amis.json");
        $friendsList = json_decode($friends);

        // replace this example code with whatever you need
        return $this->render('default/liste_amis.html.twig', [
            "amis" => $friendsList->amis
        ]);
    }

    /**
     * @Route("/ami/{id}", name="detailAmi")
     */
     public function detailAmiAction($id)
     {
         $liste = $this->_getSource('amis');

         $ami = null;
         foreach($liste as $l) {
             if ($id == $l->prenom) {
                 $ami = $l;
             }
         }
         // replace this example code with whatever you need
         return $this->render('default/ami.html.twig', [
             "ami" => $ami
         ]);
     }
}
