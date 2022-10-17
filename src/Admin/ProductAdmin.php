<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Category;



final class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('title', TextType::class);
        $form->add('description', TextAreaType::class);
        $form->add('price', NumberType::class); 
        $form->add('discountPercentage', NumberType::class);
        $form->add('brand', TextType::class);
        $form->add('category', EntityType::class, [
          'class' => Category::class,
          'choice_label' => 'name',
        ]);
        $form->add('thumbnail', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('name');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('name');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('name');
    }
}

?>