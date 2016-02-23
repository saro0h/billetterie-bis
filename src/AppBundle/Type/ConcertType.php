<?php

namespace AppBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Description of ConcertType
 *
 * @author pavithra
 */
class ConcertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prix')    
            ->add('nbrPlace')
            ->add('date')
            ->add('numAddress')
            ->add('street1')
            ->add('street2')
            ->add('zipcode')
            ->add('city');
    }
}
