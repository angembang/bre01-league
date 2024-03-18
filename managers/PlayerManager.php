<?php 
//use Twig\Node\Expression\TempNameExpression;
class PlayerManager extends AbstractManager
{
    public function findPlayerById($id): ?Player
    {
        $query = $this->db->prepare("SELECT players.*, media.*, teams.*
        FROM players 
        JOIN media ON players.portrait = media.id 
        JOIN teams ON players.team = teams.id
        WHERE id =:id");
        $parameters = [
          "id" => $id
        ];
        $query->execute($parameters);
        $playerData = $query->fetch(PDO::FETCH_ASSOC);
       
        if($playerData)
        {
          $player = new Player(
            $playerData["id"],
            $playerData["nickname"],
            $playerData["bio"],
            $playerData["portrait"],
            $playerData["team"]
          ); 
          return $player;     
        }
        return null;

    }

    public function findPlayersByTeam($team): array
    {
      $query = $this->db->prepare("SELECT players.*, teams.* 
      FROM players JOIN teams 
      ON players.team = teams.id 
      WHERE team = :team");
    $parameters = [
        "team" => $team
    ];
    $query->execute($parameters);
    $playersTeamData = $query->fetchAll(PDO::FETCH_ASSOC);

    $players = [];
    foreach ($playersTeamData as $playerTeamData) {
        $player = new Player(
            $playerTeamData["id"],
            $playerTeamData["nickname"],
            $playerTeamData["bio"],
            $playerTeamData["portrait"],
            $playerTeamData["team"]
        );
      
        $players[] = $player;
    }
    return $players;
    }
    public function findAll(): array
{
    $query = $this->db->query("SELECT * FROM players");
    $query->execute();
    $playersData = $query->fetchAll(PDO::FETCH_ASSOC);

    $players = [];
    foreach ($playersData as $data) {
        $player = new Player(
            $data["id"],
            $data["nickname"],
            $data["bio"],
            $data["portrait"],
            $data["team"]
        );
        $players[] = $player;
    }
    return $players;
}
}
