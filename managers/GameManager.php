<?php 
class GameManager extends AbstractManager
{
    public function findGameById($id): ?Game
    {
        $query = $this->db->prepare("SELECT games.*, teams.* 
        FROM games JOIN teams ON (teams.id = games.team_1 OR teams.id = games.team_2) 
        WHERE games.id =:id");
        $parameters = [
          "id" => $id
        ];
        $query->execute($parameters);
        $gameData = $query->fetch(PDO::FETCH_ASSOC);
       
        if($gameData)
        {
          $game = new Game(
            $gameData["id"],
            $gameData["name"],
            $gameData["date"],
            $gameData["team_1"],
            $gameData["team_2"],
            $gameData["winner"]
            
          );  
          return $game;    
        }
        return null;

    }

    public function findLatestGame(): ?Game
    {
        $query = $this->db->query("SELECT games.id, games.name, games.date, games.team_1, games.team_2, games.winner,
        teams.id as team_id, teams.name as team_name
        FROM games JOIN teams ON (teams.id = games.team_1 OR teams.id = games.team_2)
        ORDER BY date DESC
        LIMIT 1");

        $gameData = $query->fetch(PDO::FETCH_ASSOC);

        if ($gameData) {
            $game = new Game(
                $gameData["id"],
                $gameData["name"],
                $gameData["date"],
                $gameData["team_1"],
                $gameData["team_2"],
                $gameData["winner"]
            );
            return $game;
        }

        return null;
    }
}

