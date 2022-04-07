<?php

namespace App\Controller\Bo;

use App\Entity\Language;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
* @Route ("/bo")
*/
class UserController extends AbstractController
{
     /**
      * @var EntityManagerInterface;
      */
     private $em;

     public function __construct(EntityManagerInterface $em)
     {
         $this->em = $em;
     }

     /**
      * @Route("/add-admin", name="back_user_add")
      */
     public function new(Request $request, UserPasswordEncoderInterface $encoder)
     {
         $user = new User();
         $form = $this->createForm(UserType::class, $user, ['currentUser' => $this->getUser()]);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $userData = $request->get('user');

             $user->setRoles([$userData['role']]);

             $passwordEncoded = $encoder->encodePassword($user, $user->getPassword());
             $user->setPassword($passwordEncoded);

             $this->em->persist($user);
             $this->em->flush();

             $this->addFlash('success', 'Administrateur créé !');

             return $this->redirectToRoute('back_user_list');
         }

         return $this->render('bo/user/add.html.twig', [
             'form' => $form->createView(),
          ]);
     }

     /**
      * @Route("/edit-admin/{id}", name="back_user_edit")
      */
     public function edit(User $user, Request $request, UserPasswordEncoderInterface $encoder)
     {
         $form = $this->createForm(UserType::class, $user, ['currentUser' => $this->getUser()]);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $userData = $request->get('user');

             $user->setRoles([$userData['role']]);

             $passwordEncoded = $encoder->encodePassword($user, $user->getPassword());
             $user->setPassword($passwordEncoded);

             $this->em->persist($user);
             $this->em->flush();

             $this->addFlash('success', 'Administrateur '.$user->getEmail().' edité !');

             return $this->redirectToRoute('back_user_list');
         }

         return $this->render('bo/user/edit.html.twig', [
             'form' => $form->createView(),
             'user' => $user
          ]);
     }

     /**
      * @Route("/list-admin", name="back_user_list")
      */
     public function getUsers(UserRepository $userRepository)
     {
         return $this->render('bo/user/list.html.twig', [
              'users' => $userRepository->findAll(),
              'langs' => $this->getDoctrine()->getRepository(Language::class)->findAll(),
          ]);
     }

     /**
      * @Route("/delete-admin/{id}", name="back_user_delete")
      */
     public function deleteUser(UserRepositoryOld $userRepository, int $id)
     {
         $user = $userRepository->find($id);
         $this->em->remove($user);
         $this->em->flush();

         $this->addFlash('success', 'Administrateur supprimé !');

         return $this->redirectToRoute('back_user_list');
     }
}
