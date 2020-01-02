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

class CrudController extends AbstractController
{

    /**
     * @Route("/new", name="newPost")
     */
    public function addPost(Request $request){

        if (!$this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect('/');
        }
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

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('blog');
        }

        return $this->render('blog/newPost.html.twig',[
            'form' => $form->createView(),
            ]);
    }

  /**
    * @Route("/post/{postId}/edit", name="edit")
    */
    public function editPost(int $postId, Request $request)
    {
         $repository = $this->getDoctrine()->getRepository(PostEntity::Class);
         $post = $repository->find($postId);

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

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirect('/post/' . $postId);
        }

        if (!$this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect('/');
        }

        return $this->render('blog/editPost.html.twig',[
            'form' => $form->createView(),
            ]);
    }

    /**
    * @Route("/post/{postId}/delete", name="delete")
    */
    public function deletePost(int $postId, Request $request)
    {
        if (!$this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
                return $this->redirect('/');
            }
        $repository = $this->getDoctrine()->getRepository(PostEntity::Class);
        $post = $repository->find($postId);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($post);
        $entityManager->flush();
        return $this->redirect('/');
    }
}
