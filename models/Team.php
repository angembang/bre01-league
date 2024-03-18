<?php
class Team
{
    private ?int $id;
    private string $name;
    private string $description;
    private int $logo;
   
   
    public function __construct(?int $id, string $name, string $description, int $logo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->logo = $logo;
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getLogo(): int
    {
        return $this->logo;
    }
    
    
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setLogo(int $logo): void
    {
        $this->logo = $logo;
    }
}