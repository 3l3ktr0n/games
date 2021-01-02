<?php 
$servername = "localhost";
$username = "vhost85252s0";
$password = "0jKJd,x8Xs";
$dbname = "vhost85252s0";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}


$gameID = $_GET['id'];

   if($result = mysqli_query($link, "SELECT * FROM e107_games where id=".$gameID)){

        if(mysqli_num_rows($result) > 0){        

       if($gameID != ""){


          while($row = mysqli_fetch_array($result)){ 

           

            if($row["Screenshot1"] != ""){ 

                     $imageURL = "";

                     $imagePath = "";

                  $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row['Screenshot1']);

                  $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;

                echo $imageURL;

             }

            if($row["Screenshot2"] != ""){ 

                     $imageURL = "";

                     $imagePath = "";

                  $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row['Screenshot2']);

                  $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;

                echo $imageURL;

             }

            if($row["Screenshot3"] != ""){ 

                     $imageURL = "";

                     $imagePath = "";

                  $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row['Screenshot3']);

                  $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;

                echo $imageURL;

             }    

            if($row["Screenshot4"] != ""){ 

                     $imageURL = "";

                     $imagePath = "";

                  $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row['Screenshot4']);

                  $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;

                echo $imageURL;

             }

            if($row["Screenshot5"] != ""){ 

                     $imageURL = "";

                     $imagePath = "";

                  $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row['Screenshot5']);

                  $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;

                echo $imageURL;

             }

            if($row["Screenshot6"] != ""){ 

                     $imageURL = "";

                     $imagePath = "";

                  $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row['Screenshot6']);

                  $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;

                echo $imageURL;

             }

             }
                    }

        }

    }


?>