<?php
namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\HttpUtils;

class ProductController extends AbstractController
{
    #[Route('/product/{cat_id}')]
    public function show(Request $request, HttpUtils $utils, EntityManagerInterface $entityManager, int $cat_id = NULL): Response
    {
        $category = NULL;
        if ($cat_id == NULL) {
            $repository = $entityManager->getRepository(Product::class);
            $products = $repository->findAll();
        } else {
            $repository = $entityManager->getRepository(Category::class);
            $category = $repository->findOneById($cat_id);
            $products = $category->getProducts();
        }

        $total_products = count($products);

        return $this->render('product/index.html.twig', [
            'total_products' => $total_products,
            'products' => $products,
            'category' => $category,
        ]);
    }
}
