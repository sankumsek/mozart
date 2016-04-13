<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\CommentBundle\Model;

use Mozart\Bundle\PostBundle\Model\PostInterface;
use Mozart\Bundle\UserBundle\Model\UserInterface;

class Comment implements CommentInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $authorEmail = '';

    /**
     * @var string
     */
    protected $authorUrl = '';

    /**
     * @var string
     */
    protected $authorIp = '';

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var \DateTime
     */
    protected $dateGmt;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var int
     */
    protected $karma = 0;

    /**
     * @var string
     */
    protected $approved = 1;

    /**
     * @var string
     */
    protected $agent = '';

    /**
     * @var string
     */
    protected $type = '';

    /**
     * @var int
     */
    protected $parent;

    /**
     * @var CommentMeta
     */
    protected $metas;

    /**
     * @var PostInterface
     */
    protected $post;

    /**
     * @var UserInterface|null
     */
    protected $user;

    public function __toString()
    {
        return $this->getContent();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set author.
     *
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Get author.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set authorEmail.
     *
     * @param string $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * Get authorEmail.
     *
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * Set authorUrl.
     *
     * @param string $authorUrl
     */
    public function setAuthorUrl($authorUrl)
    {
        $this->authorUrl = $authorUrl;
    }

    /**
     * Get authorUrl.
     *
     * @return string
     */
    public function getAuthorUrl()
    {
        return $this->authorUrl;
    }

    /**
     * Set authorIp.
     *
     * @param string $authorIp
     */
    public function setAuthorIp($authorIp)
    {
        $this->authorIp = $authorIp;
    }

    /**
     * Get authorIp.
     *
     * @return string
     */
    public function getAuthorIp()
    {
        return $this->authorIp;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set date_gmt.
     *
     * @param \DateTime $dateGmt
     */
    public function setDateGmt($dateGmt)
    {
        $this->dateGmt = $dateGmt;
    }

    /**
     * Get date_gmt.
     *
     * @return \DateTime
     */
    public function getDateGmt()
    {
        return $this->dateGmt;
    }

    /**
     * Set content.
     *
     * @param string $commentContent
     */
    public function setContent($commentContent)
    {
        $this->content = $commentContent;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set karma.
     *
     * @param int $karma
     */
    public function setKarma($karma)
    {
        $this->karma = $karma;
    }

    /**
     * Get karma.
     *
     * @return int
     */
    public function getKarma()
    {
        return $this->karma;
    }

    /**
     * Set approved.
     *
     * @param string $approved
     */
    public function setApproved($approved)
    {
        if (is_bool($approved)) {
            $this->approved = $approved ? 1 : 0;
        }

        $this->approved = $approved;
    }

    /**
     * Get approved.
     *
     * @return string
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set agent.
     *
     * @param string $agent
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }

    /**
     * Get agent.
     *
     * @return string
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set type.
     *
     * @param string $commentType
     */
    public function setType($commentType)
    {
        $this->type = $commentType;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set parent.
     *
     * @param Comment $comment
     */
    public function setParent(Comment $comment)
    {
        $this->parent = $comment;
    }

    /**
     * Get parent.
     *
     * @return Comment
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add meta.
     *
     * @param CommentMeta $meta
     */
    public function addMeta(CommentMeta $meta)
    {
        $this->metas[] = $meta;
    }

    /**
     * Get metas.
     *
     * @return CommentMeta[]
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * Set post.
     *
     * @param PostInterface $post
     */
    public function setPost(PostInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Get post.
     *
     * @return PostInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set user.
     *
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
        $this->author = $user->getDisplayName();
        $this->authorUrl = $user->getUrl();
        $this->authorEmail = $user->getEmail();
    }

    /**
     * Get user.
     *
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}
