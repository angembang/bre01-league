<?php 
class MediaManager extends AbstractManager
{
    public function findMediaById($id): ?Media
    {
        $query = $this->db->prepare("SELECT * FROM media WHERE id =:id");
        $parameters = [
          "id" => $id
        ];
        $query->execute($parameters);
        $mediaData = $query->fetch(PDO::FETCH_ASSOC);
       
        if($mediaData)
        {
          $media = new Media(
            $mediaData["id"],
            $mediaData["url"],
            $mediaData["alt"]
          );
          return $media;      
        }
        return null;

    }
}
