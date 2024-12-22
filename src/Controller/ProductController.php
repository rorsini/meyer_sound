<?php
namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/')]
    public function show(EntityManagerInterface $entityManager): Response
    {


        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();

        $total_products = count($products);

        return $this->render('product/index.html.twig', [
            'total_products' => $total_products,
            'products' => $products,
        ]);
    }
}
