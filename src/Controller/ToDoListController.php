<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation\Request;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="to_do_list")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

        /**
     * @Route("/create", name="create_task", methods={"POST"})
     */
    public function create()
    {
        
    }

        /**
     * @Route("/switch-status/{id}", name="switch-status")
     */
    public function switchStatus($id)
    {
        exit('to do:switch status of the task'.$id);
    }

            /**
     * @Route("/delete/{id}", name="task_delete")
     */
    public function delete($id)
    {
        exit('to do:delete task'.$id);
    }
}
