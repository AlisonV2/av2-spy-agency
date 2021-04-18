<?php

namespace App\Controller\Admin;

use App\Entity\Agents;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;


class AgentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agents::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDateFormat('dd/MM/yyyy')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Name'),
            TextField::new('Firstname'),
            DateField::new('Birthday'),
            NumberField::new('Id_code'),
            ChoiceField::new('Country') ->setChoices([
                'France' => 'France',
                'Belgium' => 'Belgium',
                'Spain' => 'Spain',
                'Italy' => 'Italy'
            ]), 
            ChoiceField::new('Speciality') ->setChoices([
                'Extraction' =>'Extraction',
                'Spying' => 'Spying',
                'Information' => 'Information',
                'Blackmail' => 'Blackmail',
                'Killing' => 'Killing',
            ]),
        ];
    }
}