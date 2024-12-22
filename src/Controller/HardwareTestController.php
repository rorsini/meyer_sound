<?php
namespace App\Controller;

use App\Entity\HardwareTest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HardwareTestController extends AbstractController
{
    #[Route('/hardware_test')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(HardwareTest::class);
        $hardware_tests = $repository->findAll();

        $total_hardware_tests = count($hardware_tests);

        return $this->render('hardware_test/index.html.twig', [
            'total_hardware_tests' => $total_hardware_tests,
            'hardware_tests' => $hardware_tests,
        ]);
    }

    #[Route('/create_hardware_test')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(HardwareTest::class);
        $hardware_tests = $repository->findAll();

        $total_hardware_tests = count($hardware_tests);

        return $this->render('hardware_test/form.html.twig', [
            'total_hardware_tests' => $total_hardware_tests,
            'hardware_tests' => $hardware_tests,
        ]);
    }
}
