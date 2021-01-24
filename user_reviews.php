<?php
/*
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
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

$rating = "";

if($result_rating = mysqli_query($link, "SELECT commentRating FROM e107_game_comment where postID=".$gameID))

	{

		$num_rows = $result_rating->num_rows;

		$userReviewCount = mysqli_num_rows($result_rating);

		if(mysqli_num_rows($result_rating) > 0){

		//$commentLoop = 0;

		$ratingResult = "";

			while($row_rating = mysqli_fetch_array($result_rating)){

				if($row_rating["commentRating"] != 0)

					{

						$ratingResult = $row_rating["commentRating"];							    	

						$sum_of_rating += $ratingResult;

						$sum_of_rating_multi5 = $sum_of_rating*5;

                        $numberOfUsers_Array[] = $ratingResult;

					}

				}

            }

    }

$numberOfUsers_Array_Count = array_count_values($numberOfUsers_Array);

$numberOfUsers_Array_Count = array_sum($numberOfUsers_Array_Count);

$numberOfUsers = $numberOfUsers_Array_Count*5;

$rating = $sum_of_rating_multi5/$numberOfUsers;

if($rating != "" && $num_rows > 0 ){

?>        

<div class="rating_box">
    <h4>Game rating</h4>          
        <?php 
        $rating_image = SITEURL."e107_plugins/games/images/rating_star.png";
        ?>
        <div class="rating_bg" style="background:url(<?php echo $rating_image; ?>);">  
        <?php echo $rating; ?>           
        </div>
</div>

<?php }   

  //$rating = number_format($rating, 1);

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where postID=".$gameID)){

      $commentsNum = mysqli_num_rows($result);

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

        //$actionPath_delete = SITEURL."game_update/game_comment_delete.php";

/*    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where postID=".$gameID)){
echo mysqli_num_rows($result); echo "<BR><BR>";
        if(mysqli_num_rows($result) > 0){

        $commentLoop = 0;
/*
while($row = mysqli_fetch_array($result))
{
$rows[] = $row;
}

foreach($rows as $row)
{
echo $row['commentTitle'];
echo '<br>';
echo $row['commentDate'];
echo '<br>';
echo $row['postComment'];
echo '<br>';
}*/
/*
        while($row = mysqli_fetch_assoc($result)){
print_r($row); echo "<BR><BR>";
        $commentLoop++;

            $postComment = $row["postComment"];             

            $commentID = $row["commentID"];              

            $commentDate = $row["commentDate"];              

            $commentTitle = $row["commentTitle"];              

            $commentUserID = $row["commentUserID"];

            $userData = e107::user($commentUserID);
            $userName = $userData['user_name'];            

            $commentRating = $row["commentRating"];              

            $commentPlatform = $row["commentPlatform"];

echo $currentReviewID;
echo $commentTitle;
echo $commentDate;                            
echo $userName;
echo $commentPlatform;
echo $postComment;        
echo $userReviewURL = SITEURL."user_review.php?id=".$commentID;
//<a href="echo $userReviewURL;" target="_blank"> Read more</a>
//<div class="rating_bg" style="background:url(echo $starImage;);
echo $commentRating;
echo $gameID;
echo $postID;
echo $row;

      }

  }


}*/


$sql = "SELECT * FROM e107_game_comment WHERE postID=".$gameID;
$result = mysqli_query($link, $sql);
$result_check = mysqli_num_rows($result);

    if($result_check > 0){

        while($row = mysqli_fetch_array($result)){
            $commentID = $row['commentID'];
            $commentTitle = $row['commentTitle'];
            $commentDate = $row['commentDate'];
            $commentRating = $row['commentRating'];
            $commentPlatform = $row['commentPlatform'];
            $commentPost = $row['postComment'];
            $userReviewURL = SITEURL."user_review.php?id=".$commentID;

            echo $commentTitle . "<BR>";
            echo $commentDate . "<BR>";
            echo $commentRating . "<BR>";
            echo $commentPlatform . "<BR>";
            echo $commentPost . "<BR>";
            ?><a href="<?php echo $userReviewURL; ?>" target="_blank"> Read more</a><BR><BR><?php
        }

    }

?>
