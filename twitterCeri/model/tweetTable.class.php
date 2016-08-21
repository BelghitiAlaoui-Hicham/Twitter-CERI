<?php
	class tweetTable{
		public static function getTweets(){
    		$connection = new dbconnection() ;
    		$sql = "select * from jabaianb.tweet ORDER BY id DESC" ;
    		$res = $connection->doQueryObject( $sql,"tweet" );

    		if($res === false)
     		 	return false;

    		return $res;
    }

  public static function getTweetsPostedById($id)
  {
    if(!empty($id)){
      $connection = new dbconnection() ;
      $sql = "select * from jabaianb.tweet where id='".$id."' ORDER BY id DESC" ;
      $res = $connection->doQueryObjectOne( $sql,"tweet");
      
      if($res === false)
        return false;

      return $res;
      }
    }

     public static function getNewTweets($id)
  {
    if(!empty($id)){
      $connection = new dbconnection() ;
      $sql = "select * from jabaianb.tweet where id >'".$id."' ORDER BY id DESC" ;
      $res = $connection->doQueryObject( $sql,"tweet");
      
      if($res === false)
        return false;

      return $res;
      }
    }

    public static function getTweetsByEmmeteurId($id)
  {
    if(!empty($id)){
      $connection = new dbconnection() ;
      $sql = "select * from jabaianb.tweet where parent='".$id."' or emetteur='".$id."' ORDER BY id DESC" ;
      $res = $connection->doQueryObject( $sql,"tweet");
      
      if($res === false)
        return false;

      return $res;
      }
    }

     public static function getLikeByMessage($id){
        if(!empty($id)){
          $connection = new dbconnection() ;
          $sql = "select * from jabaianb.vote where message=".$id ;
          $res = $connection->doQueryObject( $sql,"tweet");
            return $res;
          
          if($res === false)
            return false;

          return $res;
          }
      }
    public static function getLastTweet(){
        $connection = new dbconnection() ;
        $sql = "select * from jabaianb.tweet order by id desc limit 1";
        $res = $connection->doQueryObjectOne( $sql,"tweet");
        return $res;
        if($res === false)
          return false;
      return $res;
      }
}
  