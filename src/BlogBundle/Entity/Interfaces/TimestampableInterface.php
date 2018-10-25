<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 */

namespace BlogBundle\Entity\Interfaces;

/**
 * TimestampableInterface
 */
interface TimestampableInterface
{
    /**
     * Returns createdAt value.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime;

    /**
     * Returns updatedAt value.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime;

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Updates createdAt and updatedAt timestamps.
     * @return void
     */
    public function updateTimestamps(): void;
}