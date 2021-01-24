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


$gameID = $_GET['id']; ?>

<div class="row game_content  sep_section" id="news">    

<div class="col-sm-12">

<?php  
if($result_news = mysqli_query($link, "SELECT NewsTagsSELECTED FROM e107_games where id=".$gameID)){

if(mysqli_num_rows($result_news) > 0){

    $row_news_array = mysqli_fetch_array($result_news);
    
    $row_news_array = $row_news_array[0];
    
    $row_news_array = explode(",", $row_news_array);     
    //print_r($row_news_array);

foreach ($row_news_array as $row_news_val) {     
    
    if(!empty($row_news_val) && $news_id_array = mysqli_query($link, "SELECT news_id FROM e107_news where news_meta_keywords like '%".$row_news_val."%'")){ 
    
    if(mysqli_num_rows($news_id_array) > 0){
        
        while($news_id_val = mysqli_fetch_array($news_id_array))
        {
          $news_id_val_array[] = $news_id_val[0];
        }
      } 
    }       
}

    $news_id_val_array = array_unique($news_id_val_array);

    if($news_id_array == ""){ echo 'No news found for this game.';}

}
 
$news_tag_id_array = $news_id_val_array;
/*$sizeNewsTag = sizeof($news_tag_id_array);
if($sizeNewsTag == "")
{
?>
<h3>No news found for this game.</h3>
<?php  
}*/
//var_dump($result_news);
//var_dump($news_id_val_array);
    foreach($news_tag_id_array as $NewsIds){

        if($result_newsData = mysqli_query($link, "SELECT * FROM e107_news where news_id=".$NewsIds)){

            if(mysqli_num_rows($result_newsData) > 0){
            
            while($result_newsValue = mysqli_fetch_array($result_newsData)){

                $news_title = $result_newsValue['news_title'];

                $news_id = $result_newsValue['news_id'];

                $news_meta_keywords = $result_newsValue['news_meta_keywords'];

                $newsLink = SITEURL."news.php?extend.".$news_id;

                $news_datestamp = $result_newsValue['news_datestamp'];

                $news_thumbnail = $result_newsValue['news_thumbnail'];

                $news_thumbnail_array = explode(",", $news_thumbnail);

                $news_thumbnail = $news_thumbnail_array[0];

                $imagePath = str_replace("{e_MEDIA_IMAGE}","",$news_thumbnail);

                $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;
                ?>
                <div class="col-sm-4">
                
                <div class="game_box custom_single_pa">

                    <div class="cover">

                    <a class="img" href="<?php echo $newsLink; ?>">  

                    <div class="background_image" style="background: url(<?php echo $imageURL; ?>)"></div>                

                    </a>

                    </div>

                    <div class="info">

                    <div class="heading">

                        <strong>                     

                        <a href="<?php echo $newsLink; ?>">

                        <?php echo $news_title; ?>                         

                        </a>

                        </strong>

                    </div>       

                    <div class="game_category">

                        <ul>

                        <?php 

                        if($news_meta_keywords != "")

                        {

                        ?>

                        <li>

                        <strong>Meta keywords: </strong>                   

                        <?php echo $news_meta_keywords; ?>

                        </li>

                        <?php

                            }

                        ?>

                        <li>

                        <strong>Date: </strong>                   

                        <?php 

                        echo date('l \t\h\e jS', $news_datestamp);

                        ?>

                        </li>

                        </ul>

                    </div>  

                    </div>

                </div>
                
                </div>      

                <?php
                }

            }

        }

    }
    
}
 //print_r($sizeNewsTag);
  //print_r($news_tag_id_array);   
 // print_r($NewsIds); 
 //var_dump($row_news_array);
  
?>
