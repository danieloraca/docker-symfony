<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $post = new Post();
        $post->setName('test');
        $post->setContent('content');
dump($_ENV);die();
        $this->entityManager->persist($post);
        $this->entityManager->flush();

        return $this->render('default/index.html.twig', [
            'form' => 'happy',
        ]);
    }
}
