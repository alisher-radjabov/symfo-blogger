<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 * Date: 17.09.2017
 * Time: 18:17
 */

namespace BlogBundle\Managers\Traits;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Doctrine\ORM\Query;

trait PagerfantaBuilderTrait
{
    /**
     *
     * @param Query $query
     * @param int   $currentPage
     * @param int   $maxPerPage
     *
     * @return Pagerfanta
     */
    public function getPaginator(Query $query, int $currentPage, int $maxPerPage) : Pagerfanta
    {
        $paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage($maxPerPage);
        $paginator->setCurrentPage($currentPage);

        return $paginator;
    }
}