<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\PostEntity;
use \DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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

    /**
     * @Route("/new", name="newPost")
     */
    public function addPost(){
        $post = new PostEntity();
        $post->setTitle('');
        $post->setUrl('');
        $post->setContent('');
        $post->setPublished(new DateTime);

        $form = $this->createFormBuilder($post)
                ->add('title', TextType::class, array(
                                             'attr' => array(
                                                 'placeholder' => 'Un bon titre',
                                             )))
                ->add('content', Textareatype::class,array(
                                             'attr' => array(
                                                 'placeholder' => 'Un bon article',
                                             )))
                ->getForm();

        return $this->render('blog/newPost.html.twig',[
            'form' => $form->createView(),
            ]);
    }
}

/*
        $entityManager = $this->getDoctrine()->getManager();
        $post = new PostEntity();
        $post->setTitle('Titre');
        $post->setUrl('url');
        $post->setContent('Content here');
        $post->setPublished(new DateTime);
        $entityManager->persist($post);
        $entityManager->flush();
*/
