<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 */

namespace BlogBundle\Entity\Traits;

/**
 * IdentifierTrait
 */
trait IdentifierTrait
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}