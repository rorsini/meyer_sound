<?php
namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/category')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Category::class);
        $categories = $repository->findAll();

        $total_categories = count($categories);

        return $this->render('category/index.html.twig', [
            'total_categories' => $total_categories,
            'categories' => $categories,
        ]);
    }
}
