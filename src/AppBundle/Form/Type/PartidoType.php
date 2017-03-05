<?php
namespace AppBundle\Form\Type;

use AppBundle\Entity\Partido;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartidoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaCelebracion')
            ->add('equipoLocal')
            ->add('marcadorLocal')
            ->add('equipoVisitante')
            ->add('marcadorVisitante');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partido::class
        ]);
    }
}