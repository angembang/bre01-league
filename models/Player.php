<?php

class Player
{
    private ?int $id;
    private string $nickname;
    private string $bio;
    private int $portrait;
    private int $team;
    private string $teamName = ""; 
   
   
    public function __construct(?int $id, string $nickname, string $bio, int $portrait, int $team)
    {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->bio = $bio;
        $this->portrait = $portrait;
        $this->team = $team;
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNickname(): string
    {
        return $this->nickname;
    }
    public function getBio(): string
    {
        return $this->bio;
    }
    public function getPortrait(): int
    {
        return $this->portrait;
    }
    public function getTeam(): int
    {
        return $this->team;
    }
   
   
   
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function setNickname(string $nickname): void
    {
      $this->nickname = $nickname;
    }
    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }
    public function setPortrait(int $portrait): void
    {
        $this->portrait = $portrait;
    }



}
