<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace  Mozart\Bundle\CommentBundle\Model;

use Mozart\Bundle\NucleusBundle\Model\AbstractManager;
use Mozart\Bundle\PostBundle\Model\PostInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class CommentManager extends AbstractManager implements CommentManagerInterface
{
    protected $em;
    protected $repository;
    protected $class;

    public function __construct(Container $container, $class = 'Mozart\Bundle\CommentBundle\Entity\Comment')
    {
        parent::__construct($container);

        $this->em = $this->getEntityManager();
        $this->repository = $this->em->getRepository('MozartCommentBundle:Comment');
        $this->class = $class;
    }

    public function createComment(PostInterface $post, Request $request)
    {
        $class = $this->getClass();

        /**
         * @var Comment
         */
        $comment = new $class();

        $comment->setPost($post);
        $comment->setAuthorIp($request->getClientIp());
        $comment->setAgent($request->headers->get('user-agent', 'Unkown agent'));

        return $comment;
    }

    public function deleteComment(CommentInterface $comment, $andFlush = true)
    {
        $this->em->remove($comment);

        if ($andFlush) {
            $this->em->flush();
        }
    }

    public function updateComment(CommentInterface $comment, $andFlush = true)
    {
        $this->em->persist($comment);

        if ($andFlush) {
            $this->em->flush();
        }
    }

    public function getClass()
    {
        return $this->class;
    }

    public function findCommentsByPost(PostInterface $post)
    {
        return $this->repository->findBy(array(
            'post' => $post,
            'approved' => 1,
            'type' => '',
        ));
    }
}
