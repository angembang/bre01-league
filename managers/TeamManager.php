<?php 
//use Twig\Node\Expression\TempNameExpression;
class TeamManager extends AbstractManager
{
    public function findTeamByName($name): ?Team
    {
        $query = $this->db->prepare("SELECT  teams.*, media.* 
        FROM teams JOIN media ON teams.logo = media.id
        WHERE name =:name");
        $parameters = [
          "name" => $name
        ];
        $query->execute($parameters);
        $teamData = $query->fetch(PDO::FETCH_ASSOC);
        
       
        if($teamData)
        {
            
            $team = new Team(
            $teamData["id"],
            $teamData["name"],
            $teamData["description"],
            $teamData["logo"]
          ); 
         
          return $team;
        
        }
        return null;

    }

    public function findTeamById($id): ?Team
    {
        $query = $this->db->prepare("SELECT  teams.*, media.* 
        FROM teams JOIN media ON teams.logo = media.id
        WHERE teams.id =:id");
        $parameters = [
          "id" => $id
        ];
        $query->execute($parameters);
        $teamData = $query->fetch(PDO::FETCH_ASSOC);
        
       
        if($teamData)
        {
            
            $team = new Team(
            $teamData["id"],
            $teamData["name"],
            $teamData["description"],
            $teamData["logo"]
          ); 
         
          return $team;
        
        }
        return null;

    }

    public function findAll(): ?Team
    {
        $query = $this->db->query("SELECT teams.*, media.* 
            FROM teams JOIN media ON teams.logo = media.id
            LIMIT 1");
        $teamData = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($teamData) {
            $team = new Team(
                $teamData["id"],
                $teamData["name"],
                $teamData["description"],
                $teamData["logo"]
            );
            return $team;
        }

        return null;
    }


    
}
