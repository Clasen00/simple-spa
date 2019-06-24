<?php

namespace App\Service;

use App\Entity\Issues;
use App\Entity\Priority;
use Doctrine\ORM\EntityManagerInterface;

final class IssuesService
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * PostService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $message
     * @return Issue
     */
    public function createIssue(string $subject, string $description, string $startDate): Issues
    {
        $issuesEntity = new Issues();
        $priorityEntity = new Priority();

        $issuesEntity->setSubject($subject);
        $issuesEntity->setDescription($description);
        $issuesEntity->setStartDate($startDate);
        $issuesEntity->setPriority($priorityEntity->getPriorityId);

        $priorityEntity->setPriorityName('Нормальный');
        $priorityEntity->setName($issuesEntity->getId);
        
        $this->em->persist($issuesEntity);
        $this->em->persist($priorityEntity);
        $this->em->flush();

        return $issuesEntity;
    }

    /**
     * @return object[]
     */
    public function getAll(): array
    {
        return $this->em->getRepository(Issues::class)->findBy([], ['id' => 'DESC']);
    }
}