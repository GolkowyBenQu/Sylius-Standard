<?php

namespace App\Form\Extension;

use App\ValueObject\ColorChoice;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Adding new fields works just like in the parent form type.
            ->add('color', ChoiceType::class, [
                'required' => false,
                'label' => 'app.form.product.color',
                'choices' => [
                    ColorChoice::RED => ColorChoice::RED,
                    ColorChoice::GREEN => ColorChoice::GREEN,
                    ColorChoice::BLUE => ColorChoice::BLUE,
                ],
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
