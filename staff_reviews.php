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

if($gameID != "")

  {

    if($result = mysqli_query($link, "SELECT * FROM e107_games")){



        if(mysqli_num_rows($result) > 0){

        ?>

        

        <?php

            while($row = mysqli_fetch_array($result)){

              if($row['id'] == $gameID)

              {

                $newsCatSelected = $row['NewsCategory'];



               $reviewIDs = $row['reviewSelected'];              

               $reviewID_Array = explode(",", $reviewIDs);

               

               $reviewLoop = 0;

               foreach($reviewID_Array as $reviewID)

               {

                 $reviewLoop++;

                 if($reviewLoop == 1)

                 {

                     $reviewQuery =  'WHERE (ID='.$reviewID.')';

                 }

                 else if($reviewLoop >= 1)

                 {

                     $reviewQuery .=  ' or (ID='.$reviewID.')';

                 }

               }  
$reviewGameQuery = 'WHERE FIND_IN_SET('.$gameID.',ReviewGameSelected)';

                   if($result_review = mysqli_query($link, "SELECT * FROM e107_games_reviews ".$reviewGameQuery)){

                           if(mysqli_num_rows($result_review) > 0){
                    ?>

                    <h3 style="display: none;">What Users says about this Game.</h3>

                    <?php

                             while($row_review = mysqli_fetch_array($result_review)){

                             $review_title = $row_review["Title"];                        

                    $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row_review['Image']);

                    $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;

                    $currentReviewID = $row_review['ID'];

                    $reviewID_URL = SITEURL."review.php?id=".$currentReviewID;



                    $reviewTitle = $row_review['Title'];

                    $reviewRating = $row_review['Rating'];

                    $reviewDescription = $row_review['Description'];

                    $reviewType = $row_review['ReviewType'];


                        ?>

                            <div class="col-sm-12 game_box reviewBOX">

                              <div class="reviewBox_left">

                             <!-- <div class="reviewID"><?php echo $currentReviewID;  ?></div> -->

                            

                            <div class="reviewTitle">

                          <a href="<?php echo $reviewID_URL; ?>">

                            <?php echo $reviewTitle;?>                            

                            </a>

                      </div>



                      <div class="review_Content">

                      <div class="review_cover">

                      <a class="img" href="<?php echo $reviewID_URL; ?>">  

                        <img src="<?php echo $imageURL; ?>">

                        </a>

                      </div>

                      <div class="revie_shortContent">

                        <p><?php  echo $reviewDescription; ?></p>

                        <div class="reviewReadmore">

                          <a href="<?php echo $reviewID_URL; ?>">

                               Read more

                             </a>

                         </div>

                      </div>

                      </div>





                            </div>

                            <div class="reviewBox_right">

                              <div class="rating_box">

                     <h4>Game rating</h4>          

                             <div class="rating_bg" style="background:url(<?php echo $starImage; ?>);">  

                     <?php 

                       echo $reviewRating; 

                     ?>           

                     </div>

                </div>                     

                            </div>



                    </div>

                        <?php

                          

                              }

                           }
else { echo "We have no review for this game yet. If you've played it, write a review and tell us what you think!";}
                        }

                              }

                           }

                        }

                           }

                        }

             

?>