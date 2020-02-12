<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Task;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="to_do_list")
     */
    public function index()
    {
        $tasks=$this->getDoctrine()->getRepository(Task::class)->findBy([],['id'=>'DESC']);
        return $this->render('index.html.twig',['tasks'=>$tasks]);
    }

        /**
     * @Route("/create", name="create_task", methods={"POST"})
     */
    public function create(Request $request)
    {
        $title = trim($request->request->get('title'));
        if(empty($title))
        return $this->redirectToRoute('to_do_list');

        $entityManger = $this->getDoctrine()->getManager();
        $task = new Task;
        $task->setTitle($title);
        $entityManger->persist($task);
        $entityManger->flush();     
        return $this->redirectToRoute('to_do_list');
    }


        /**
     * @Route("/switch-status/{id}", name="switch-status")
     */
    public function switchStatus($id)
    {
        $entityManger = $this->getDoctrine()->getManager();
        $task = $entityManger->getRepository(Task::class)->find($id);

        $task->setStatus( ! $task->getStatus() );
        $entityManger->flush();
        return $this->redirectToRoute('to_do_list');
    }

            /**
     * @Route("/delete/{id}", name="task_delete")
     */
    public function delete($id)
    {
        exit('to do:delete task'.$id);
    }
}
