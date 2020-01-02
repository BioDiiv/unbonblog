<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\PostEntity;
use \DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     */
    public function homePage()
    {
        $repository = $this->getDoctrine()->getRepository(PostEntity::Class);
        $posts = $repository->findBy(
            array(),
            array('published' => 'DESC')
        );; // get and sort all posts from the most recent to the oldest

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
        $post = $repository->find($postId); // get post with id = $postid

        return $this->render('blog/post.html.twig', [
            'post' => $post,
            ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutPage()
    {
        return $this->render('blog/about.html.twig', [
            ]);
    }
}
