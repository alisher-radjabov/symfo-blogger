<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 */

namespace BlogBundle\Entity\Interfaces;


interface PostInterface extends IdentifierInterface
{
    /**
     * @param string|null $title
     *
     * @return PostInterface
     */
    public function setTitle(?string $title): PostInterface;

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * Set description
     *
     * @param string|null $description
     *
     * @return PostInterface
     */
    public function setDescription(?string $description): PostInterface;

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Set text
     *
     * @param string|null $text
     *
     * @return PostInterface
     */
    public function setText(?string $text): PostInterface;

    /**
     * Get text
     *
     * @return string|null
     */
    public function getText(): ?string;
}