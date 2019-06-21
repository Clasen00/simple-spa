<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IssuesRepository")
 */
class Issues
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $priority;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parent;

    /**
     * @ORM\Column(type="text")
     */
    private $subject;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $start_date;

    /**
     * @ORM\Column(type="smallint")
     */
    private $done_ratio;

    /**
     * @ORM\Column(type="text")
     */
    private $created_on;

    /**
     * @ORM\Column(type="text")
     */
    private $updated_on;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getParent(): ?int
    {
        return $this->parent;
    }

    public function setParent(?int $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->start_date;
    }

    public function setStartDate(string $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getDoneRatio(): ?int
    {
        return $this->done_ratio;
    }

    public function setDoneRatio(int $done_ratio): self
    {
        $this->done_ratio = $done_ratio;

        return $this;
    }

    public function getCreatedOn(): ?string
    {
        return $this->created_on;
    }

    public function setCreatedOn(string $created_on): self
    {
        $this->created_on = $created_on;

        return $this;
    }

    public function getUpdatedOn(): ?string
    {
        return $this->updated_on;
    }

    public function setUpdatedOn(string $updated_on): self
    {
        $this->updated_on = $updated_on;

        return $this;
    }
}
