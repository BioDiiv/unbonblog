<?php
// tests/Controller/BlogControllerTest.php
namespace App\Tests\Entity;

use App\Entity\PostEntity;
use PHPUnit\Framework\TestCase;

//@todo Implement the unit testing for PostEntity
class PostEntityTest extends TestCase
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=10000)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $published;

    public function getId(): ?int
    {}

    public function getTitle(): ?string
    {}

    public function setTitle(string $title): self
    {}

    public function getUrl(): ?string
    {}

    public function setUrl(string $url): self
    {}

    public function getContent(): ?string
    {}

    public function setContent(string $content): self
    {}

    public function getPublished(): ?\DateTimeInterface
    {}

    public function setPublished(\DateTimeInterface $published): self
    {}
}