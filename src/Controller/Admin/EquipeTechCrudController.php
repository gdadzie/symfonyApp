<?php

namespace App\Controller\Admin;

use App\Entity\EquipeTech;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipeTechCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EquipeTech::class;
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
