<?php

namespace App\Controller;

use App\Form\BookType;
use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
    #[Route('/addformbook', name: 'addformbook')]
    public function addformauthor(ManagerRegistry $managerRegistry,Request $req ): Response
    {
        $em=$managerRegistry->getmanager();
        $book=new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($req);
       
       if($form->isSubmitted() and $form->isValid())
       {
       $em->persist($book);
        $em->flush();
        return $this->redirectToRoute('app_showbookdb');
       }
    
    return $this->renderForm('book/addformbook.html.twig', [
        'controller_name' => 'AZIZ',
        'f'=>$form,]);
//fichier mapping fih l'historique mtaa migrations

}
#[Route('/appshowdbk', name: 'app_showbookdb')]
    public function showdbk(BookRepository $book145): Response
    {
        $name=$book145->findAll();
        //dd($name);
       // var_dump($name).die();
       // print_r($name);
       // $nigffger=$author145->find
        return $this->render('book/showdbk.html.twig', [
            'controller_name' => 'AZIZ',
            'base_books'=>$name,
            
       ]);
    }
    #[Route('/modifierbook/{id}', name: 'modifierbook')]
    public function modifierbook($id,ManagerRegistry $managerRegistry,Request $req,BookRepository $book145): Response
    {
//var_dump($id).die();
$em=$managerRegistry->getmanager();

        $namkde= $book145->find($id);
        //var_dump($namkde).die();
       
        //$author=new Authorentity();
        $form = $this->createForm(BookType::class, $namkde);
        $form->handleRequest($req);
       
       if($form->isSubmitted() and $form->isValid())
       {
       $em->persist($namkde);
    $em->flush();
    return $this->redirectToRoute('app_showbookdb');
       }
return $this->renderForm('book/editbk.html.twig', [
        'controller_name' => 'AZIZ',
        'form'=>$form,
    //'id'=>$id,
]);
}
#[Route('/deletebook/{id}', name: 'deletebook')]
public function deletebook($id, ManagerRegistry $manager,BookRepository $repo): Response
{
    $emm = $manager->getManager();
    $idremove = $repo->find($id);
    $emm->remove($idremove);
    $emm->flush();
    return $this->redirectToRoute('app_showbookdb');
}



}
