<?php

namespace App\Form;

use App\Entity\Films;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaveFilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('origina_title')
            ->add('original_language')
            ->add('genre')
            ->add('release_data')
            ->add('poster_path')
            ->add('overview')
            ->add('video_path')
            ->add('category', ChoiceType::class, [
                'choices'  => [
                    'Film' => "films",
                    'Serie' => "series",
                ],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
