<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use ContainerDCvUMpu\getBookTypeService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/addformauthor', name: 'addformauthor')]
    public function addformauthor(ManagerRegistry $managerRegistry,Request $req ): Response
    {
        $em=$managerRegistry->getmanager();
        $author=new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($req);
       
       if($form->isSubmitted() and $form->isValid())
       {
       $em->persist($author);
        $em->flush();
      //$DonAmount=$author->getUsername();     ki nheb nekhou valeur barka mil formulaire
        return $this->redirectToRoute('app_showauthordb');
       }
    
    return $this->renderForm('author/addformauthor.html.twig', [
        'controller_name' => 'AZIZ',
        'f'=>$form,]);
//fichier mapping fih l'historique mtaa migrations

}
#[Route('/appshowdb', name: 'app_showauthordb')]
    public function showdb(AuthorRepository $author145): Response
    {
        $name=$author145->findAll();
        //dd($name);
       // var_dump($name).die();
       // print_r($name);
       // $nigffger=$author145->find
        return $this->render('author/showdb.html.twig', [
            'controller_name' => 'AZIZ',
            'base_authors'=>$name,
            
       ]);
    }
    #[Route('/modifierauthor/{id}', name: 'modifierauthor')]
    public function modifierauthor($id,ManagerRegistry $managerRegistry,Request $req,AuthorRepository $author145): Response
    {
//var_dump($id).die();
$em=$managerRegistry->getmanager();

        $namkde= $author145->find($id);
        //var_dump($namkde).die();
       
        //$author=new Authorentity();
        $form = $this->createForm(AuthorType::class, $namkde);
        $form->handleRequest($req);
       
       if($form->isSubmitted() and $form->isValid())
       {
       $em->persist($namkde);
    $em->flush();
    return $this->redirectToRoute('app_showauthordb');
       }
return $this->renderForm('author/edit.html.twig', [
        'controller_name' => 'AZIZ',
        'form'=>$form,
    //'id'=>$id,
]);
}
#[Route('/deleteauthor/{id}', name: 'deleteauthor')]
public function deleteauthor($id, ManagerRegistry $manager,AuthorRepository $repo): Response
{
    $emm = $manager->getManager();
    $idremove = $repo->find($id);
    $emm->remove($idremove);
    $emm->flush();
return $this->redirectToRoute('app_showauthordb');
}
#[Route('/appshowdbByFirstname', name: 'app_showauthordbByFirstname')]
    public function showdbByFirstname(AuthorRepository $author145): Response
    {
        $name=$author145->showallauthorsByFirstalphabetL();//shows all authors that their usernames starts with l
        //dd($name);
       // var_dump($name).die();
       // print_r($name);
       // $nigffger=$author145->find
       
        return $this->render('author/showdbByFirstname.html.twig', [
            'controller_name' => 'AZIZ',
            'base_authors'=>$name,
            
       ]);
    }
    #[Route('/OrderauthorsByFirstname', name: 'app_OrderauthorsByFirstname')]
    public function OrderauthorsByFirstname(AuthorRepository $author145): Response
    {
        $name=$author145->OrderauthorsByFirstname();//shows the usernames ordered by alphabets ABCDEFG
        //dd($name);
       // var_dump($name).die();
       // print_r($name);
       // $nigffger=$author145->find
        return $this->render('author/showdb.html.twig', [
            'controller_name' => 'AZIZ',
            'base_authors'=>$name,
            
       ]);
    }
    #[Route('/showallauthorsBylastalphabet', name: 'app_showallauthorsBylastalphabet')]
    public function showallauthorsBylastalphabet(AuthorRepository $author145): Response
    {
        $name=$author145->showallauthorsBylastalphabet();//shows the usernames that their last alphabets is i
        //dd($name);
       // var_dump($name).die();
       // print_r($name);
       // $nigffger=$author145->find
        return $this->render('author/showdb.html.twig', [
            'controller_name' => 'AZIZ',
            'base_authors'=>$name,
            
       ]);
    }
    #[Route('/showalistauthors', name: 'app_showalistauthors')]
    public function showalistauthors(AuthorRepository $author145): Response
    {
        $name=$author145->showalistauthors();//shows the usernames that their last alphabets is i
        //dd($name);
       // var_dump($name).die();
       // print_r($name);
       // $nigffger=$author145->find
        return $this->render('author/showdb.html.twig', [
            'controller_name' => 'AZIZ',
            'base_authors'=>$name,]);
    }













}
