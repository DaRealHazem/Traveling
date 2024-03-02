<?php
namespace App\Form;

use App\Entity\Spot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
class SpotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
       
        ->add('nom', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'Le nom ne peut pas être vide.']),
            ],
        ])
        ->add('localisation', ChoiceType::class, [
            'choices' => [
                'Tunisie' => 'Tunisie',
                'United States' => 'United States',
                'Canada' => 'Canada',
                'Mexico' => 'Mexico',
                'Brazil' => 'Brazil',
                'Argentina' => 'Argentina',
                'United Kingdom' => 'United Kingdom',
                'Germany' => 'Germany',
                'France' => 'France',
                'Italy' => 'Italy',
                'Spain' => 'Spain',
                'Russia' => 'Russia',
                'China' => 'China',
                'Japan' => 'Japan',
                'South Korea' => 'South Korea',
                'India' => 'India',
                'Australia' => 'Australia',
                'South Africa' => 'South Africa',
                'Egypt' => 'Egypt',
                'Nigeria' => 'Nigeria',
                'Kenya' => 'Kenya',
                'Ethiopia' => 'Ethiopia',
                'Saudi Arabia' => 'Saudi Arabia',
                'United Arab Emirates' => 'United Arab Emirates',
                'Qatar' => 'Qatar',
                'Kuwait' => 'Kuwait',
                'Turkey' => 'Turkey',
                'Greece' => 'Greece',
                'Switzerland' => 'Switzerland',
                'Sweden' => 'Sweden',
                'Norway' => 'Norway',
                'Denmark' => 'Denmark',
                'Finland' => 'Finland',
                'Netherlands' => 'Netherlands',
                'Belgium' => 'Belgium',
                'Portugal' => 'Portugal',
                'Ireland' => 'Ireland',
                'Austria' => 'Austria',
                'Hungary' => 'Hungary',
                'Czech Republic' => 'Czech Republic',
                'Poland' => 'Poland',
                'Slovakia' => 'Slovakia',
                'Romania' => 'Romania',
                'Bulgaria' => 'Bulgaria',
                'Ukraine' => 'Ukraine',
                'Iran' => 'Iran',
                'Pakistan' => 'Pakistan',
                'Bangladesh' => 'Bangladesh',
                'Indonesia' => 'Indonesia',         
            ],
        ])
        ->add('description', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'La description ne peut pas être vide.']),
            ],
        ])
        ->add('save', SubmitType::class, [
            'label' => 'Save',
        ])
        ->add('photo', FileType::class,[
            'label'=>'Portrait',
            'required'=>false,
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Spot::class,
        ]);
    }
}
