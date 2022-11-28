<?php

namespace App\Controller\Admin;

use App\Entity\Apiclientsgrants;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ApiclientsgrantsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Apiclientsgrants::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
