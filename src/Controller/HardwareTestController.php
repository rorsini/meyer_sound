<?php
namespace App\Controller;

use App\Form\Type\HardwareTestType;
use App\Entity\HardwareTest;
use App\Entity\TestStatus;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HardwareTestController extends AbstractController
{
    #[Route('/create_hardware_test')]
    public function create(EntityManagerInterface $entityManager, Request $request): Response
    {
        $hw_test = new HardwareTest();
        $entityManager->persist($hw_test);

        $product = new Product();
        $entityManager->persist($product);

        #$hw_test.setProduct($product);

        $status = new TestStatus();
        $entityManager->persist($status);

        #$hw_test.setStatus($status);

        $form = $this->createForm(HardwareTestType::class, $hw_test);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hardwareTest = $form->getData();
            #var_dump($hardwareTest);

            $entityManager->persist($hardwareTest);
            #entityManager->flush();

            #return $this->redirectToRoute('list_hardware_test');
        }

        return $this->render('hardware_test/new.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/hardware_test', name: 'list_hardware_test')]
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
}
