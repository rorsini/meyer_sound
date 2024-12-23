<?php
namespace App\Controller;

use App\Entity\TestStatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestStatusController extends AbstractController
{
    #[Route('/test_status')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(TestStatus::class);
        $test_statuses = $repository->findAll();

        $total_test_statuses = count($test_statuses);

        return $this->render('test_status/index.html.twig', [
            'total_test_statuses' => $total_test_statuses,
            'test_statuses' => $test_statuses,
        ]);
    }
}
