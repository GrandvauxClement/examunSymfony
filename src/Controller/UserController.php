<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="user")
     */
    public function index()
    {
        $user = $this->getUser();
        $employees = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('user/index.html.twig', [
            'employees' => $employees,
            'user' => $user
        ]);
    }

    /**
     * @Route("/delete-employe/{employe}", name="delete_employe")
     */

    public function delete(User $employe)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($employe);
        $entityManager->flush();
        return $this->redirectToRoute('user');
    }
}
