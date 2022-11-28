<?php

namespace App\Controller\Admin;

use App\Entity\Apiclients;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;



class ApiclientsCrudController extends AbstractCrudController
{


    public static function getEntityFqcn(): string
    {
        return Apiclients::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('client_id'),
            TextField::new('client_name'),
            TextEditorField::new('short_description'),
            BooleanField::new('active'),
            IdField::new('user_id'),
            ArrayField::new('structures'),



        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Partenaire')
            ->setDateFormat('DD-MM-YYYY')
            ->renderContentMaximized()
            ->setEntityPermission('ROLE_ADMIN')
            ->setSearchFields(['client_id', 'description'])
            ->setDefaultSort(['client_name' => 'DESC'])
            ->setPaginatorUseOutputWalkers(true)


            ;
    }

}
