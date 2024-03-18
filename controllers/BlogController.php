<?php
class BlogController extends AbstractController
{
  public function home(): void
    {
    
       $playerManager = new PlayerManager();
        $teamManager = new TeamManager();
        $gameManager = new GameManager();
      
        $players = $playerManager->findPlayersByTeam(1);
        $team = $teamManager->findAll();
       

        $mediaManager = new MediaManager();
        $logoId =  $team->getLogo();
        $logo = $mediaManager->findMediaById( $logoId);
        
       $playerMediaArray= [];
        foreach($players as $player)
        {
          $playerPortrait = $player->getPortrait();
          $playerM = $mediaManager->findMediaById($playerPortrait); 
  
          $playerMedia = [$player, $playerM];
          $playerMediaArray[]= $playerMedia;
        }

        
        $playersRand = $playerManager->findAll();
        $playersRandom = array_rand( $playersRand, 3);
        
        $playerMediaArrayRan = [];
        foreach ($playersRandom as $randomIndex) {
                $playerR = $playersRand[$randomIndex];
                $playerPortrait = $playerR->getPortrait();
                $playerM = $mediaManager->findMediaById($playerPortrait);
                $playerMedia = [$playerR, $playerM];
                $playerMediaArrayRan[] = $playerMedia;
            }
        
        // Récupération du dernier match
        $latestGame = $gameManager->findLatestGame();

        $team1 = $teamManager->findTeamById($latestGame->getTeam_1());
        $team2 = $teamManager->findTeamById($latestGame->getTeam_2());

        $team1LogoId = $team1->getLogo();
        $team2LogoId = $team2->getLogo();

        $team1Logo = $mediaManager->findMediaById($team1LogoId);
        $team2Logo = $mediaManager->findMediaById($team2LogoId);
        
    
        $teamAndMedia = [$team, $logo];
      
        $this->render("home.html.twig", [
          "team"=>$teamAndMedia, 
          "players"=>[$playerMediaArray], 
          "playersRand"=>[$playerMediaArrayRan],
          "latestGame" => $latestGame,
          "team1Logo" => $team1Logo, 
          "team2Logo" => $team2Logo
          ] );
    }
}