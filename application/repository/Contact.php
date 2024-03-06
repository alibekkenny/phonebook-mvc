<?php

namespace repository;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'contacts')]
class Contact
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $description;
    /** @var ArrayCollection<string, ArticleAttribute> */
    #[ORM\OneToMany(targetEntity: ContactDetails::class, mappedBy: 'contact', cascade: ['ALL'], indexBy: 'contact_details')]
    private Collection $contactDetails;
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'contacts')]
    private User $user;

    public function getContactDetails(): Collection
    {
        return $this->contactDetails;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}