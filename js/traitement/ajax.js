jQuery(document).ready(function(){
	function updateWall(text){
		$id = $('.nouveauPost').first().val();
		 
            var req;
            if (window.XMLHttpRequest) req= new XMLHttpRequest();
            else if (window.ActiveXObject) req= new ActiveXObject("Microsoft.XMLHTTP");
            //envoi request
            req.open("GET", "?action=updateMur&idTweet="+$id, true);
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200){
                    if(req.responseText != ""){
                        $('.rowTweet').prepend(req.responseText);
                        Materialize.toast('<span>Nouveau Tweets reçu</span>', 2500);    
                    }
                }else if(req.readyState == 4 && req.status != 200){
                    Materialize.toast('<span>Problème lors de chargement du mur , veuillez actualiser ta page</span>', 2500);
                }
            };
            req.send(null);
	}
	
	
	function mafonction() {
		$("#profile-page-wall-posts").append(".");
	}
	setInterval( function(){
		
		updateWall()
	},10000);

//Ĉhangement du statut----------START---------------------------->
  $("#updateStatu").submit(function(e) {
    	e.preventDefault();
    	$id = $(this).find("#id").val();
    	$status = $(this).find("#textarea").val();
    	$.post("?action=updateStatus",
  			{
        		id: $id,
        		status: $status
    		},
    		function(data, status){
        	var req;
            if (window.XMLHttpRequest) req= new XMLHttpRequest();
            else if (window.ActiveXObject) req= new ActiveXObject("Microsoft.XMLHTTP");
            //envoi request
            req.open("GET", "?action=status&id="+$id, true);
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200){
                    $("#status").html(req.responseText);
                    $("#textarea").val("");
                    Materialize.toast('<span>Statut modifier avec succées</span>', 2500);
                }else if(req.readyState == 4 && req.status != 200){
                    Materialize.toast('<span>Problème lors de chargement des données , veuillez actualiser ta page</span>', 2500);
                }
            };
            req.send(null);
        });

	});
  //Ĉhangement du statut----------FIN---------------------------->
    $("#tweet").submit(function(e) {
        e.preventDefault();
        var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
        $id = $(this).find("#id").val();
        $tweet = $(this).find("#textarea2").val();
        form_data.append('file', file_data);
        form_data.append('id', $id);
        form_data.append('tweet', $tweet);
         $.ajax({
            type:'POST',
            url: "?action=nouveauTweets",
            data:form_data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                //Materialize.toast('<span>Tweet ajouté avec succées</span>', 2500);
                $(this).find("#textarea").val("");
                if (window.XMLHttpRequest) req= new XMLHttpRequest();
            else if (window.ActiveXObject) req= new ActiveXObject("Microsoft.XMLHTTP");
            //envoi request
            req.open("GET", "?action=visualiserTweet", true);
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200){
                    $(".rowTweet").prepend(req.responseText);
                    $("#textarea2").val("");
                    Materialize.toast('<span>Tweet ajouté avec succées</span>', 2500);
                }else if(req.readyState == 4 && req.status != 200){
                    Materialize.toast('<span>Problème lors de chargement des données , veuillez actualiser ta page</span>', 2500);
                }
            };
            req.send(null);

            }
        });
       
    });

/*------------VOter-------------------*/
    $(".voter").click(function(e){
       e.preventDefault(); 
       $message = $(this).parent().attr('id');
       $id= $("#id").val();
       $idSpan = $(this).find('.nbrVote');

       $.post("?action=voter",
            {
                utilisateur: $id,
                message: $message
            },
            function(data, status){
            var req;
            if (window.XMLHttpRequest) req= new XMLHttpRequest();
            else if (window.ActiveXObject) req= new ActiveXObject("Microsoft.XMLHTTP");
            //envoi request
            req.open("GET", "?action=visualiserVote&idPost="+$message, true);
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200){
                    $idSpan.html(req.responseText);
                    Materialize.toast('vous avez voter avec succées', 2500);
                }
            };
            req.send(null);
        });
        
 });
/*------------FIN VOte-------------------*/
$(".partager").click(function(e){
       e.preventDefault(); 
       $idTweet = $(this).attr("id");
       $id= $("#id").val();
       $.post("?action=partager",
            {
                idTweet: $idTweet,
                emetteur: $id
            },
            function(data, status){
            var req;
            if (window.XMLHttpRequest) req= new XMLHttpRequest();
            else if (window.ActiveXObject) req= new ActiveXObject("Microsoft.XMLHTTP");
            //envoi request
            req.open("GET", "?action=visualiserTweet", true);
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200){
                    $(".rowTweet").prepend(req.responseText);
                    Materialize.toast('<span>Tweet partager avec succées</span>', 2500);
                }else if(req.readyState == 4 && req.status != 200){
                    Materialize.toast('<span>Problème lors de chargement des données , veuillez actualiser ta page</span>', 2500);
                }
            };
            req.send(null);
        });
       //$(".rowTweet").prepend($idTweet);
});


});



