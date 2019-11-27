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

        $entityManager = $this->getDoctrine()->getManager();
        $post = new PostEntity();
        $post->setTitle('Titre');
        $post->setUrl('url');
        $post->setContent('Content here');
        $post->setPublished(new DateTime);
        $entityManager->persist($post);
        $entityManager->flush();

        $array = array();
        array_push($array, "apple", "raspberry", "orange");
        return $this->render('blog/homepage.html.twig', [
                           'posts' => $array,
                       ]);
    }
    /**
     * @Route("/post/{postId}", name="app_post")
     */
    public function post($postId)
    {

        $repository = $this->getDoctrine()->getRepository(PostEntity::Class);
        $posts = $repository->findAll();

        return $this->render('blog/post.html.twig', [
            'page_title' => 'Article',
            'posts' => $posts,
            'post_id' => $postId]);
    }
}
