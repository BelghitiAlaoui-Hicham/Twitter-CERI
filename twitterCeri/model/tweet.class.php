<?php 
	class tweet extends basemodel{
		
		public function getPost(){
			 return postTable::getPostById($this->post);
  		}

  		public function getParent(){
        return utilisateurTable::getUserById($this->parent);
      }

      public function getEmetteur(){
        return utilisateurTable::getUserById($this->emetteur);
      }

     

  		public function getLikes(){
        return tweetTable::getLikeByMessage($this->post);
      }

      
	}