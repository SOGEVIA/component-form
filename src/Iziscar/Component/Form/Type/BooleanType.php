<?php

namespace Iziscar\Component\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Boolean form type class
 */
class BooleanType extends AbstractType
{
    /**
     * set default options
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'choices' => [
                '0' => 'Non',
                '1' => 'Oui',
            ],
            'attr' => ['class' => 'boolean-form-type']
        ]);
    }

    /**
     * Get parent type
     *
     * @return string
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return 'boolean';
    }

}
