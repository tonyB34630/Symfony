<?php

namespace App\Form;

use App\Entity\Bieres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BieresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_Biere')
            ->add('marque_Biere')
            ->add('titreAlcool_Biere')
            ->add('contenance_Biere')
            ->add('prixAchat_Biere')
            ->add('prixVente_Biere')
            ->add('prixTTC_Biere')
            ->add('type1_Biere')
            ->add('type2_Biere')
            ->add('type3_Biere')
            ->add('profil_Biere')
            ->add('couleur_Biere')
            ->add('fabricant_Biere')
            ->add('conditionnement')
            ->add('origine_Biere')
            ->add('description_Biere')
            ->add('ingredients_Biere')
            ->add('consigne_Biere')
            ->add('Bio_Biere')
            ->add('promo_Biere')
            ->add('sansAlc_Biere')
            ->add('SGluten_Biere')
            ->add('actif')
            ->add('users')
            // ->add('images')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bieres::class,
        ]);
    }
}
