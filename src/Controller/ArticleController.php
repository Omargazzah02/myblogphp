<?php

namespace App\Controller;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Article;
use App\Entity\Comment;

use Symfony\Component\HttpFoundation\Request;


class ArticleController extends AbstractController
{
   

    #[Route('user/article_index', name: 'articles')]
    public function index (ArticleRepository  $articleRepository ) : response {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $articles = $articleRepository->findAll();
        return $this->render('article/index.html.twig', [
            'articles' =>$articles, 'title' => "Nos Articles"
        ]);


    }




    #[Route('user/acceuil', name: 'acceuil')]
    public function articleCheapest (ArticleRepository  $articleRepository ) : response {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $articles = $articleRepository->findThreeCheapest();
        return $this->render('article/index.html.twig', [
            'articles' =>$articles, 'title' => "Les 3 articles les moins chers"
        ]);

    }







    #[Route('/user/article/{id}', name: 'user/article_detail')]
public function show(int $id, ArticleRepository $articleRepository): Response
{
    $this->denyAccessUnlessGranted('ROLE_USER');

    // Récupérer l'article par son ID
    $article = $articleRepository->find($id);

    // Vérifier si l'article existe
    if (!$article) {
        throw $this->createNotFoundException('Article non trouvé');
    }

    return $this->render('article/show.html.twig', [
        'article' => $article,
    ]);
}



#[Route('user/article/{id}/comment', name: 'comment_add')]

public function addComment(Article $article, Request $request,  EntityManagerInterface $entityManager)
{
    $content = $request->request->get('content');
    
    if ($content) {
        $comment = new Comment();
        $comment->setContent($content);
        $comment->setArticle($article);
        $comment->setUser($this->getUser()); 
        $comment->setCreationDate(new \DateTime()); 

      
        $entityManager->persist($comment);
        $entityManager->flush();

        // Rediriger vers la page de l'article après l'ajout du commentaire
        return $this->redirectToRoute('user/article_detail', ['id' => $article->getId()]);
    }

    // Si le contenu est vide ou s'il y a une erreur
    $this->addFlash('error', 'Le commentaire ne peut pas être vide.');

    return $this->redirectToRoute('user/article_detail', ['id' => $article->getId()]);
}




}
