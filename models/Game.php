<?php 
class Game
{
    private ?int $id;
    private string $name;
    private string $date;
    private int $team_1;
    private int $team_2;
    private int $winner;
   
   
    public function __construct(?int $id, string $name, string $date, int $team_1, int $team_2, int $winner)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->team_1 = $team_1;
        $this->team_2 = $team_2;
        $this->winner = $winner;
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDate(): string
    {
        return $this->date;
    }
    public function getTeam_1(): int
    {
        return $this->team_1;
    }
    public function getTeam_2(): int
    {
        return $this->team_2;
    }
    public function getWinner(): int
    {
        return $this->winner;
    }
   
   
   
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name): void
    {
      $this->name = $name;
    }
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
    public function setTeam_1(int $team_1): void
    {
        $this->team_1 = $team_1;
    }
    public function setTeam_2(int $team_2): void
    {
        $this->team_2 = $team_2;
    }
    public function setWinner(int $winner): void
    {
        $this->winner = $winner;
    }
}
