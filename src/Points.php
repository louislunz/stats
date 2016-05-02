<?php

namespace PHPWorldWide\Stats;

use PHPWorldWide\Stats\Model\Topic;
use PHPWorldWide\Stats\Model\Comment;
use PHPWorldWide\Stats\Model\Reply;

/**
 * Class Points.
 */
class Points
{
    /**
     * @var int
     */
    private $pointsCount = 0;

    /**
     * Get number of points.
     *
     * @return int
     */
    public function getPointsCount()
    {
        return $this->pointsCount;
    }

    /**
     * Add points based on creating a topic.
     *
     * @param Topic $topic
     */
    public function addPointsForTopic(Topic $topic)
    {
        ++$this->pointsCount;
        $this->pointsCount += ($topic->getLikesCount() >= 100) ? 15 : ceil($topic->getLikesCount() / 10);
    }

    /**
     * Add points based on comment.
     *
     * @param Comment $comment
     */
    public function addPointsForComment(Comment $comment)
    {
        ++$this->pointsCount;
        $this->pointsCount += ($comment->getLikesCount() > 100) ? 11 : ceil($comment->getLikesCount() / 10);
        $this->pointsCount += (strlen($comment->getMessage()) > 100) ? 1 : 0;
    }

    /**
     * Add points based on reply.
     * 
     * @param Reply $reply
     */
    public function addPointsForReply(Reply $reply)
    {
        ++$this->pointsCount;
        $this->pointsCount += ($reply->getLikesCount() > 100) ? 11 : ceil($reply->getLikesCount() / 10);
        $this->pointsCount += (strlen($reply->getMessage()) > 100) ? 1 : 0;
    }
}