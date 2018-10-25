<?php

namespace BlogBundle\Entity;

use BlogBundle\Entity\Interfaces\PostInterface;

/**
 * Post
 */
class Post implements Interfaces\PostInterface, Interfaces\TimestampableInterface
{
    use Traits\IdentifierTrait;
    use Traits\TimestampableTrait;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $text;

    /**
     * Set title
     *
     * @param string|null $title
     *
     * @return PostInterface
     */
    public function setTitle(?string $title): PostInterface
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return PostInterface
     */
    public function setDescription(?string $description): PostInterface
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return PostInterface
     */
    public function setText(?string $text): PostInterface
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
}

