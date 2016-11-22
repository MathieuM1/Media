<?php

namespace MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AlbumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreAlbum')
            ->add('artiste')
            ->add('genre', ChoiceType::class, array(
                // Shows "Hip-Hop" to the user, returns "Hiphop" when selected
                'choices' => array('Hip-Hop' => 'Hiphop', 'Soul' => 'Soul', 'Rock' => 'Rock'),
                'choices_as_values' => true,

            ))
            ->add('support', ChoiceType::class, array(
                'choices' => array('Vynil' => 'Vynil', 'Cd' => 'Cd', 'K7' => 'cassette'),
                'choices_as_values' => true,

            ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediaBundle\Entity\Album'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mediabundle_album';
    }


}
