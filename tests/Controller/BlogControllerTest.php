<?php
// tests/Controller/BlogControllerTest.php
namespace App\Tests\Controller;

use App\Controller\BlogController;
use PHPUnit\Framework\TestCase;

//@todo Implement the unit testing for BlogController
class BlogControllerTest extends TestCase
{
    /**
     * @Route("/", name="blog")
     */
    public function homePage(){}

    /**
     * @Route("/post/{postId}", name="postById")
     */
    public function post(int $postId){}

    /**
     * @Route("/new", name="newPost")
     */
    public function addPost(Request $request){}

    /**
     * @Route("/about", name="about")
     */
    public function aboutPage(){}
}