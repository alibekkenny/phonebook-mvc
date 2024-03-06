<?php

namespace repository;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'contact_details')]
class ContactDetails
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $phone;
    #[ORM\ManyToOne(targetEntity: PhoneCategory::class, inversedBy: 'contact_details')]
    private PhoneCategory $category;
    #[ORM\ManyToOne(targetEntity: Contact::class, inversedBy: 'contact_details')]
    private Contact $contact;

    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function setCategory(PhoneCategory $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): PhoneCategory
    {
        return $this->category;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

}
