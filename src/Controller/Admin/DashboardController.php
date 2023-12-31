<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use  App\Controller\Admin\CategoryCrudController;

use App\Entity\Comment;
use  App\Controller\Admin\CommentCrudController;

use App\Entity\Post;
use  App\Controller\Admin\PostCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(PostCrudController::class)->generateUrl());
        return parent::index();
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Platzi');
    }

    public function configureMenuItems(): iterable
    {
         //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Categorías', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Publicaciones', 'fas fa-list', Post::class);
        yield MenuItem::linkToCrud('Comentarios', 'fas fa-list', Comment::class);

        yield MenuItem::linkToRoute('Sitio Web', 'fa-fa-home', 'app_home');
    }
}
