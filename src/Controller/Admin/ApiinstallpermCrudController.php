<?php

namespace App\Controller\Admin;

use App\Entity\Apiinstallperm;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ApiinstallpermCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Apiinstallperm::class;
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
