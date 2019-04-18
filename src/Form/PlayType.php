<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use App\Entity\Game;

class PlayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $game = new Game();
        $cases = $game->getCases();
        $aCases = [];

        foreach ($cases as $row) {
            $aCases[$row->getNumber()] = $row->getNumber();
        }

        sort($aCases);
        $builder
            ->add('mise', IntegerType::class)
            ->add('case', ChoiceType::class, [
                'choices' => $aCases,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
