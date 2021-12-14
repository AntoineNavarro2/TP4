<?php

namespace App\Form;

use App\Entity\Intervenant;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IntervenantFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom', TextType::class)
            ->add('specialiteprofessionnelle', TextType::class)
            ->add('enregistrer', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervenant::class,
        ]);
    }

    /**
     * @Route ("/intervenant/create", name="intervenant_create")
     */
    public function new()
    {
        $task = new Intervenant();


        $form = $this->createForm( IntervenantFormType::class, $task);

        return$this->render(  'intervenant/new.html.twig',
            ['intervenantForm' => $form->createView(),
        ]);

    }


}
