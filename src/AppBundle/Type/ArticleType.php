<?php

namespace AppBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('authorName')    
            ->add('authorPicture')
            ->add('authorPosition')
            ->add('authorTwitter')
            ->add('content',null,array('attr'=>array('class'=>'ckeditor')))
        ;
    }
}
