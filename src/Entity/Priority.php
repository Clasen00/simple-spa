<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriorityRepository")
 */
class Priority
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $priority_id;

    /**
     * @ORM\Column(type="text")
     */
    private $priority_name;

    /**
     * @ORM\Column(type="text")
     */
    private $issue_id;

    public function getPriorityId(): ?int
    {
        return $this->priority_id;
    }

    public function getPriorityName(): ?string
    {
        return $this->priority_name;
    }

    public function setPriorityName(string $priority_name): self
    {
        $this->priority_name = $priority_name;

        return $this;
    }

    public function getIssueId(): ?string
    {
        return $this->issue_id;
    }

    public function setIssueId(string $issue_id): self
    {
        $this->issue_id = $issue_id;

        return $this;
    }
}
