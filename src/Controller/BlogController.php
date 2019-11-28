<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\PostEntity;
use \DateTime;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     */
    public function homePage()
    {
        $repository = $this->getDoctrine()->getRepository(PostEntity::Class);
        $posts = $repository->findAll();

        return $this->render('blog/homepage.html.twig', [
            'posts' => $posts,
            ]);
    }

    /**
     * @Route("/post/{postId}", name="postById")
     */
    public function post(int $postId)
    {
        $repository = $this->getDoctrine()->getRepository(PostEntity::Class);
        $post = $repository->find($postId);

        return $this->render('blog/post.html.twig', [
            'post' => $post,
            ]);
    }

    public function addPost(){
        $entityManager = $this->getDoctrine()->getManager();
        $post = new PostEntity();
        $post->setTitle('Titre');
        $post->setUrl('url');
        $post->setContent('Content here');
        $post->setPublished(new DateTime);
        $entityManager->persist($post);
        $entityManager->flush();
    }
}
