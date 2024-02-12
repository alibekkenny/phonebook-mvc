<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'phone_categories')]
class PhoneCategory
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $category;
    #[ORM\OneToMany(targetEntity: ContactDetails::class, mappedBy: 'phone_category', cascade: ['ALL'], indexBy: 'contact_details')]
    private Collection $contactDetails;

    public function getId(): int
    {
        return $this->id;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

}