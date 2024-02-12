<?php

namespace entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $email;
    #[ORM\Column(type: 'string')]
    private string $password;

    /** @var ArrayCollection<string, ArticleAttribute> */
    #[ORM\OneToMany(targetEntity: Contact::class, mappedBy: 'user', cascade: ['ALL'], indexBy: 'contact')]
    private Collection $contacts;

    public function __toString()
    {
        $result = "id: " . $this->getId() . "\tname: " . $this->name . "\temail: " . $this->email;
        return $result;
    }

    public function addContact(string $name, Contact $value): void
    {
        $this->contacts[$name] = new Contact($name, $value, $this);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

}