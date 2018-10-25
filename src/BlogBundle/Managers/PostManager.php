<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 */

namespace BlogBundle\Managers;

use BlogBundle\Entity\Interfaces\PostInterface;
use BlogBundle\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Pagerfanta\Pagerfanta;


/**
 * PostManager
 */
class PostManager extends BaseEntityManager
{
    use Traits\PagerfantaBuilderTrait;

    /* @var int */
    private $maxPerPage;

    /* @var string */
    private $searchString;

    /**
     * PostManager constructor.
     * @param EntityManagerInterface $entityManager
     * @param $class
     * @param int $maxPerPage
     */
    public function __construct(EntityManagerInterface $entityManager, $class, int $maxPerPage = 5)
    {
        parent::__construct($entityManager, $class);

        $this->maxPerPage = $maxPerPage;
    }

    /**
     * @return int
     */
    public function getMaxPerPage(): int
    {
        return $this->maxPerPage;
    }

    /**
     * @param int $maxPerPage
     * @return PostManager
     */
    public function setMaxPerPage(int $maxPerPage): PostManager
    {
        $this->maxPerPage = $maxPerPage;

        return $this;
    }

    /**
     * @param string|null $searchString
     *
     * @return PostManager
     */
    public function setSearchString(?string $searchString): PostManager
    {
        $this->searchString = $searchString;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSearchString(): ?string
    {
        return $this->searchString;
    }

    /**
     * @param int  $id
     *
     * @return PostInterface|null
     */
    public function getById(int $id): ?PostInterface
    {
        /* @var PostRepository $repository */
        $repository = $this->getRepository();

        /* @var  QueryBuilder $queryBuilder*/
        $queryBuilder = $repository->createQueryBuilder('post');
        $queryBuilder->select('post')->where(
            $queryBuilder->expr()->andX(
                $queryBuilder->expr()->eq('post.id', $id)
            )
        );

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * @param int $page
     *
     * @return Pagerfanta
     */
    public function getPosts(int $page = 1): Pagerfanta
    {
        /* @var PageRepository $repository */
        $repository = $this->getRepository();

        /* @var  QueryBuilder $queryBuilder*/
        $queryBuilder = $repository->createQueryBuilder('post');
        $queryBuilder->select('post')->orderBy('post.createdAt', 'DESC');

        if($this->getSearchString() !== null) {

            $queryBuilder->andWhere(
                $queryBuilder->expr()->like('post.title',':searchString')
            );

            $queryBuilder->setParameter(':searchString', '%' . $this->getSearchString() . '%');
        }

        return $this->getPaginator($queryBuilder->getQuery(), $page, $this->getMaxPerPage());
    }

    /**
     * @return PostInterface
     */
    public function create(): PostInterface
    {
        $class = $this->getClass();

        return new $class;
    }

    /**
     * @param PostInterface $post
     * @param bool $andFlush
     */
    public function save(PostInterface $post, bool $andFlush = true): void
    {
        if($post->getId()) {
            $this->getEntityManager()->merge($post);
        } else {
            $this->getEntityManager()->persist($post);
        }

        if($andFlush) {
            $this->flush();
        }
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param PostInterface $post
     * @param bool $andFlush
     */
    public function delete(PostInterface $post, bool $andFlush = true): void
    {
        $this->getEntityManager()->remove($post);
        if($andFlush) {
            $this->flush();
        }
    }
}