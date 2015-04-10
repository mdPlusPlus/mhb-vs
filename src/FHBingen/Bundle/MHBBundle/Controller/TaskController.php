<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 10.04.2015
 * Time: 02:37
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use FHBingen\Bundle\MHBBundle\Entity\Task;
use FHBingen\Bundle\MHBBundle\Entity\Tag;
use FHBingen\Bundle\MHBBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    /**
     * @Route("/task")
     */
    public function newAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects


            //my code
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
        }

        return $this->render('@FHBingenMHB/Task/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/task/{id}")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('FHBingenMHBBundle:Task')->find($id);

        if (!$task) {
            throw $this->createNotFoundException('No task found for id ' . $id);
        }

        $originalTags = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($task->getTags() as $tag) {
            $originalTags->add($tag);
        }

        $editForm = $this->createForm(new TaskType(), $task);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            // remove the relationship between the tag and the Task
            foreach ($originalTags as $tag) {
                if (false === $task->getTags()->contains($tag)) {
                    // remove the Task from the Tag
                    //$tag->getTask()->removeElement($task);

                    // if it was a many-to-one relationship, remove the relationship like this
                    //$tag->setTask(null);

                    //$em->persist($tag);

                    // if you wanted to delete the Tag entirely, you can also do that
                    $em->remove($tag);
                }
            }

            $em->persist($task);
            $em->flush();

            // redirect back to some edit page
            // return $this->redirectToRoute('task_edit', array('id' => $id));
        }

        // render some form template
        return $this->render('@FHBingenMHB/Task/new.html.twig', array(
            'form' => $editForm->createView(),
        ));
    }
}