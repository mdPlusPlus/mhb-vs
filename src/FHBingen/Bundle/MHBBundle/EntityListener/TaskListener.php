<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 16.04.2015
 * Time: 14:50
 */

namespace FHBingen\Bundle\MHBBundle\EntityListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use FHBingen\Bundle\MHBBundle\Entity\Task;

class TaskListener
{

    public function prePersist(Task $task, LifecycleEventArgs $args)
    {
        file_put_contents('task.log', 'prePersist' . PHP_EOL, FILE_APPEND);
    }

    public function postPersist(Task $task, LifecycleEventArgs $args)
    {
        file_put_contents('task.log', 'postPersist' . PHP_EOL, FILE_APPEND);
    }

    public function preUpdate(Task $task, PreUpdateEventArgs $args)
    {
        file_put_contents('task.log', 'preUpdate' . PHP_EOL, FILE_APPEND);
    }

    public function postUpdate(Task $task, LifecycleEventArgs $args)
    {
        file_put_contents('task.log', 'postUpdate' . PHP_EOL, FILE_APPEND);
    }

    public function postRemove(Task $task, LifecycleEventArgs $args)
    {
        file_put_contents('task.log', 'postRemove' . PHP_EOL, FILE_APPEND);
    }

    public function preRemove(Task $task, LifecycleEventArgs $args)
    {
        file_put_contents('task.log', 'preRemove' . PHP_EOL, FILE_APPEND);
    }

    public function preFlush(Task $task, PreFlushEventArgs $args)
    {
        file_put_contents('task.log', 'preFlush' . PHP_EOL, FILE_APPEND);
    }

    public function postLoad(Task $task, LifecycleEventArgs $args)
    {
        file_put_contents('task.log', 'postFlush' . PHP_EOL, FILE_APPEND);
    }
}