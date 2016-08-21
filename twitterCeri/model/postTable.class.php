<?php

class postTable {

  public static function getPostById($id) {
    if(!empty($id)){
      $connection = new dbconnection() ;
      $sql = "select * from jabaianb.post where id='".$id."'" ;
      $res = $connection->doQueryObjectOne( $sql,"post" );
      
      if($res === false)
        return false;

      return $res;
      }
      else
        return false;
    }

}
?>