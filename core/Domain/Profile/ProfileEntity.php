<?php

namespace Acme\Domain\Profile;

use Acme\Domain\BaseEntity;
use Acme\Domain\EntityId;
use Acme\Domain\City\CityEntity;
use Acme\Domain\ProfileType\ProfileTypeEntity;
use Acme\Domain\Traits\Serializable;
use JetBrains\PhpStorm\Pure;

class ProfileEntity extends BaseEntity
{
    use Serializable;

    private EntityId $id;
    private string $first_name;
    private string $middle_name;
    private string $last_names;
    private DocumentTypeEntity $document_type;
    private string $document_number;
    private string $address;
    private string $phone;
    private CityEntity $city;
    private ProfileTypeEntity $profile_type;

    #[Pure]
    public function getId(): int
    {
        return $this->id->value();
    }

    public function setId(EntityId $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getMiddleName(): string
    {
        return $this->middle_name;
    }

    public function setMiddleName(string $middle_name): void
    {
        $this->middle_name = $middle_name;
    }

    public function getLastNames(): string
    {
        return $this->last_names;
    }

    public function setLastNames(string $last_names): void
    {
        $this->last_names = $last_names;
    }

    public function getDocumentNumber(): string
    {
        return $this->document_number;
    }

    public function getDocumentType(): DocumentTypeEntity
    {
        return $this->document_type;
    }

    public function setDocumentType(DocumentTypeEntity $document_type): void
    {
        $this->document_type = $document_type;
    }

    public function setDocumentNumber(string $document_number): void
    {
        $this->document_number = $document_number;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getCity(): CityEntity
    {
        return $this->city;
    }

    public function setCity(CityEntity $city): void
    {
        $this->city = $city;
    }

    public function getProfileType(): ProfileTypeEntity
    {
        return $this->profile_type;
    }

    public function setProfileType(ProfileTypeEntity $profile_type): void
    {
        $this->profile_type = $profile_type;
    }
}
