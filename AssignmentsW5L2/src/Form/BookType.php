<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use App\Entity\Genre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('isbn', TextType::class)
            ->add('publishDate', DateType::class)
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'name',
            ])
            ->add('editors', EntityType::class, [
                'class' => Editor::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('genres', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
