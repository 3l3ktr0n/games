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
?>


            <div class="clearfix"></div>

<?php 

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where postID=".$gameID)){

      $commentsNum = mysqli_num_rows($result);

        if(mysqli_num_rows($result) > 0){

          $commentLoop = 0;

          while($row = mysqli_fetch_array($result)){

            $commentLoop++;

              $postComment = $row["postComment"];              

              $commentID = $row["commentID"];              

              $commentDate = $row["commentDate"];              

              $commentRating = $row["commentRating"];              

              }

            }

        }
?>

<div class="playerReviews">
    <h3>Player Reviews</h3>
  <?php 
     $totalComments = $commentsNum;
      if($totalComments != 0){
  ?>              
      <div class="players_reviewBOX">
          <div class="playersBox_right">
        <div class="playersScrollbar">
    <?php 
      $result = "";
      $commentPercentage = "";
    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=10  AND  postID=".$gameID)){
      $numberCommentsNum = mysqli_num_rows($result);
    }
    $commentPercentage = $totalComments / $numberCommentsNum;
    $commentPercentage = 100/$commentPercentage;
    if($commentPercentage == 0)
    {
      $commentPercentage = 20;
    }    
    ?>            
    <div class="container">
      <div class="skills" data-width="10" style="width: <?php echo $commentPercentage;?>%;"> 10 (<?php echo $numberCommentsNum;?>)</div>
      <!-- <div class="rating_s">
        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
        <?php //echo $commentPercentage;?>%;"> 10 (<?php echo $numberCommentsNum;?>)</div> -->
    </div>

  <?php 
      $result = "";
      $commentPercentage = "";
    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=9  AND  postID=".$gameID)){
      $numberCommentsNum = mysqli_num_rows($result);
    }
    $commentPercentage = $totalComments / $numberCommentsNum;
    $commentPercentage = 100/$commentPercentage;
    if($commentPercentage == 0)
    {
      $commentPercentage = 20;
    }    
  ?>
  <div class="container">
    <div class="skills"  data-width="9" style="width: <?php echo $commentPercentage;?>%;">9 (<?php echo $numberCommentsNum;?>)</div>
  </div>
<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=8  AND  postID=".$gameID)){

      $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

    if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }    

?>                          

  <div class="container">
    <div class="skills" data-width="8" style="width: <?php echo $commentPercentage;?>%;">8 (<?php echo $numberCommentsNum;?>)</div>
  </div>

<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=7  AND  postID=".$gameID)){

      $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

    if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }    

?>                          

<div class="container">
  <div class="skills" data-width="7" style="width: <?php echo $commentPercentage;?>%;"><span>7 (<?php echo $numberCommentsNum;?>)</span></div>
</div>

<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=6  AND  postID=".$gameID)){

      $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

    if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }    

?>                        

    <div class="container">
      <div class="skills" data-width="6" style="width: <?php echo $commentPercentage;?>%;">6 (<?php echo $numberCommentsNum;?>)</div>
    </div>

<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=5  AND  postID=".$gameID)){

      $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

      if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }

?>                          

    <div class="container">
      <div class="skills" data-width="5" style="width: <?php echo $commentPercentage;?>%;">5 (<?php echo $numberCommentsNum;?>)</div>
    </div>

<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=4 AND  postID=".$gameID)){

       $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

    if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }

?>                          

    <div class="container">
      <div class="skills" data-width="4" style="width: <?php echo $commentPercentage;?>%;">4 (<?php echo $numberCommentsNum;?>)</div>
    </div>

<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=3  AND  postID=".$gameID)){

      $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

    if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }

?>                          

    <div class="container">
      <div class="skills" data-width="3" style="width: <?php echo $commentPercentage;?>%;">3 (<?php echo $numberCommentsNum;?>)</div>
    </div>

<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=2 AND  postID=".$gameID)){

      $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

    if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }    

?>

    <div class="container">
      <div class="skills" data-width="2" style="width: <?php echo $commentPercentage;?>%;">2 (<?php echo $numberCommentsNum;?>)</div>
    </div>

<?php 

      $result = "";

      $commentPercentage = "";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentRating=1 AND  postID=".$gameID)){

      $numberCommentsNum = mysqli_num_rows($result);

    }



    $commentPercentage = $totalComments / $numberCommentsNum;

    $commentPercentage = 100/$commentPercentage;

    if($commentPercentage == 0)

    {

      $commentPercentage = 20;

    }    

?>                          

      <div class="container">
        <div class="skills" data-width="1" style="width: <?php echo $commentPercentage;?>%;">1 (<?php echo $numberCommentsNum;?>)</div>
      </div>
    </div>
  </div>







                  <div class="playersBox_left">
                    <div class="playerReviewbox1">
                      <div class="pr_right">
                         <?php echo $rating; ?>
                      </div>
                      <div class="pr_left">
                        <div>
                              <strong>Average Player Score </strong>                        
                         </div>
                         <div>
                         <span>Based on <?php echo $userReviewCount; ?> ratings</span>
                         </div>
                      </div>
                    </div>
                  </div>


              </div>

            </div>




            <?php } 

else

{

  echo "<h1>No reviews or ratings from players entered.</h1>";

}

?>

<h3>User reviews</h3>
<?php 

        $actionPath_delete = SITEURL."game_update/game_comment_delete.php";

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where postID=".$gameID)){

        if(mysqli_num_rows($result) > 0){

          $commentLoop = 0;

        while($row = mysqli_fetch_array($result)){

          $commentLoop++;

            $postComment = $row["postComment"];              

            $commentID = $row["commentID"];              

            $commentDate = $row["commentDate"];              

            $commentTitle = $row["commentTitle"];              

            $commentUserID = $row["commentUserID"];            

            $commentRating = $row["commentRating"];              



?>

            <div class="row">
            <div class="col-sm-12">
      <div class="game_box reviewBOX userReviewsBox">              
              <div class="reviewBox_left">

              <div class="reviewID"><?php echo $currentReviewID;  ?></div>

                

                <div class="reviewTitle user_reviewTitle">

                  

                    <h2> 
                      <?php echo $commentTitle;?>                            
                  </h2>

                 
                    <div class="userReview_info">
                      <span>Date: <?php echo $commentDate = $row["commentDate"]; ?></span>
                    <?php 
                          $commentUserID = $row["commentUserID"]; 
                $userData = e107::user($commentUserID);
                $userName = $userData['user_name'];
                    ?>
                    <span>Review by: <?php echo $userName; ?></span>
                    <?php $commentPlatform = $row["commentPlatform"];  ?>
                    <span>Platform: <?php echo $commentPlatform?></span>
                </div>

              </div>



              <div class="review_Content">

        

              <div class="revie_shortContent">

                <?php echo $postComment; ?>         

              </div>



                 <div class="reviewReadmore user_reviewReadmore">
<?php 
  $userReviewURL = SITEURL."user_review.php?id=".$commentID;
?>
                   <span> <a href="<?php echo $userReviewURL;?>" target="_blank"> Read more</a></span>

                   

              </div>



              </div>

            </div>

            <div class="reviewBox_right">

                <div class="rating_box">

             <h4>Game rating</h4>          

                 <div class="rating_bg" style="background:url(<?php echo $starImage; ?>);">

             <?php 

               echo $commentRating; 

             ?>           

             </div>

        </div>                     

            </div>



            </div></div>
            </div>



<?php 

      }

    }

  }

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

                              <div class="reviewID"><?php echo $currentReviewID;  ?></div>

                            

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

                        }

                              }

                           }

                        }

                           }

                        }

             

?>