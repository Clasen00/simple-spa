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
     * IssuesService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $subject
     * @param string $description
     * @param string $startDate
     * @return Issue
     */
    public function createIssue(string $subject, string $description, string $startDate, string $createdOn, string $updatedOn): Issues
    {
        $issuesEntity = new Issues();

        $issuesEntity->setSubject($subject);
        $issuesEntity->setDescription($description);
        $issuesEntity->setStartDate($startDate);
        $issuesEntity->setCreatedOn($createdOn);
        $issuesEntity->setUpdatedOn($updatedOn);
        $issuesEntity->setParent(330);
        $issuesEntity->setDoneRatio(0);
        $issuesEntity->setPriority(1);
        
        $this->em->persist($issuesEntity);
        $this->em->flush();

        $this->createPriority(2, 'Нормальный', $issuesEntity->getId());
        return $issuesEntity;
    }

    protected function createPriority(int $priorityId, string $priorityName, int $issuesId): Priority {
        $priorityEntity = new Priority();

        $priorityEntity->setPriorityId($priorityId);
        $priorityEntity->setPriorityName($priorityName);
        $priorityEntity->setIssueId($issuesId);
        
        $this->em->persist($priorityEntity);
        $this->em->flush();

        return $priorityEntity;
    }

    /**
     * @return object[]
     */
    public function getAll(): array
    {
        return $this->em->getRepository(Issues::class)->findBy([], ['id' => 'DESC']);
    }
}