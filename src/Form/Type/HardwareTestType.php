<?php
namespace App\Form\Type;

use App\Entity\HardwareTest;
use App\Entity\TestStatus;
use App\Entity\Product;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class HardwareTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name', TextType::class, [
            'label' => 'Name',    
        ]);
        $builder->add('product', EntityType::class, [
            'class' => Product::class,
            'choice_label' => 'Code'
        ]);
        $builder->add('status', EntityType::class, [
            'class' => TestStatus::class,
            'choice_label' => 'Name'
        ]);
        $builder->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HardwareTest::class,
        ]);
    }
}
