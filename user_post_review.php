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

<div class="row comment_system sep_section" id="comment">

  <div class="media">

    <?php 

      $actionPath = SITEURL."game_update/game_comment.php";

    ?>

    



<?php $currentUserID = USERID;

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentUserID =".$currentUserID." AND postID=".$gameID))

    {

      $userCommentPost = mysqli_num_rows($result);

    }

if(USERID != 0 && $userCommentPost < 1)
{

?>    

  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 

  </script> <script type="text/javascript">

//<![CDATA[

        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });

  //]]>

  </script>


<h3>Writer your review: </h3>
<form id="comments_form" method="post" action="<?php echo $actionPath; ?>">

  <div class="media comment-box comment-box-form clearfix">

    <div class="comment-box-left media-object pull-left">

  <!--   <div class="comment-avatar center"><img class="img-rounded rounded user-avatar" alt="" src="/wp/game_e107/thumb.php?src=%7Be_IMAGE%7Dgeneric%2Fblank_avatar.jpg&amp;w=90&amp;h=90" width="90" height="90"><div class="field-help" style="display:none;"><div class="left"><h2></h2><br>Guest<br><br></div></div></div> -->

    </div>

    <div class="media-body comment-box-right text-left">

      <div class="P10">

<div class="form-group">
   <label>Title: </label>  <input type="text" class="commentTitle" name="commentTitle">
   <input type="hidden" class="commentTitle" name="hostname" value="<?php echo $hostname; ?>">
   <input type="hidden" class="commentTitle" name="username" value="<?php echo $username; ?>">
   <input type="hidden" class="commentTitle" name="password" value="<?php echo $password; ?>">
   <input type="hidden" class="commentTitle" name="database"  value="<?php echo $database; ?>">

</div>



<div class="form-group">        

      <?php

      if($currentUserID != 0 && $userCommentPost < 1)

      // if(5 > 4)

      {

      ?>

              <div class="rating_system">

                <div class="rating_label">Rating: </div>

                <select name="user_rating">

                  <option value="1">1</option>

                  <option value="2">2</option>

                  <option value="3">3</option>

                  <option value="4">4</option>

                  <option value="5">5</option>



                  <option value="6">6</option>

                  <option value="7">7</option>

                  <option value="8">8</option>

                  <option value="9">9</option>

                  <option value="10">10</option>



                </select>

              </div>

      <?php } else

      {

        ?>

        <select name="user_rating" style="display: none;"><option value="0">0</option></select>

        <?php

      } ?>

</div>      

<div class="form-group">
  <div class="platform_label"><strong>What platform they played the game that you review?: </strong></div>
  <div class="platform_select">

<?php 
  if($result_cat = mysqli_query($link, "SELECT * FROM e107_games where id = ".$gameID)){    
      if(mysqli_num_rows($result_cat) > 0){
         while($row_cat = mysqli_fetch_array($result_cat)){
           $platform_array[] = $row_cat["platformSelected"];
         }
          } 
  } 

  if($platform_array != "")
  {
    $platform_array = explode(",", $platform_array[0]);    
?>  
  <select name="commentPlatform">
    <option>Select Platform</option>>
    <?php 
      foreach($platform_array as $platform_val)
      {
    ?>
    <option value="<?php echo $$platform_val; ?>"><?php echo $platform_val; ?></option>>
      <?php }  ?>
  </select>    
<?php } ?>
  </div>
</div>



        <input type="hidden" name="commentUserID" value="<?php echo USERID; ?>">

        <div class="form-group"><textarea name="comment_value" rows="10" cols="80" id="comment-input-news" class="comment-input form-control e-autoheight" placeholder="Leave a message..."></textarea></div>

      <div id="commentformbutton">

        <input type="submit" name="commentsubmit" value="Submit comment"  class="commentSubmit button btn btn-primary pull-right" data-pid="0" data-sort="desc" data-target="/wp/game_e107/comment.php" data-container="comments-container-news" data-input="comment-input-news">

<?php $currentUserID = USERID;

    if($result = mysqli_query($link, "SELECT * FROM e107_game_comment  where commentUserID =".$currentUserID." AND postID=".$gameID))

    {

      $userCommentPost = mysqli_num_rows($result);

    }

?>

      </div>

      </div>

    </div>

  </div>

  <div class="clear_b"><!-- --></div>

  <hr>

<div>

  <?php 

     $postID = $gameID;

     $userImage = SITEURL."e107_plugins/games/images/blank_avatar.jpg";     



     $uri = $_SERVER['REQUEST_URI'];

             $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

             $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

           $currentPage = $url;     

  ?>

      <input type="hidden" name="postID" value="<?php echo $postID; ?>">

      <input type="hidden" name="userImage" value="<?php echo $userImage; ?>">      

      <input type="hidden" name="currentPage" value="<?php echo $currentPage; ?>">  

      <?php 

        $currentDate = date("d-m-Y");

      ?>    

      <input type="hidden" name="currentDate" value="<?php echo $currentDate; ?>">      

      </div>

      </form> <?php } else{

        $loginURL = SITEURL."/login.php";

       echo '<h3>You already have Reviewed this game.</h3>'; } ?>

</div>

  <ul class="comments-container-news" style="display: none;">

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

            $commentUserID = $row["commentUserID"];            

            $commentRating = $row["commentRating"];              

?>    

    <li id="comment-<?php echo $commentLoop; ?>" class="media comment-box clearfix">

      <div class="media-object comment-box-left pull-left span1">

          <div class="comment-avatar center">

           <img class="img-rounded rounded user-avatar user-avatar-online" alt="" src="<?php echo $userImage; ?>" width="90" height="90">        

          </div>

        </div>



<div class="media-body comment-box-right ">

      <div class="row">  

          <div class="comment-box-username span2 col-xs-6 col-sm-6 col-md-6">

            <a href="/wp/game_e107/user.php?id.1">admin</a>

                </div>

        

        <div class="comment-box-date span2 col-xs-6 col-sm-6  col-md-6 text-right text-muted">

          <div><?php echo $commentDate; ?></div>
          <?php 
            if($commentRating != "0")
            {
          ?>
              <div>Rating: <?php echo $commentRating; ?></div>
          <?php
            }
          ?>
        </div>
      </div>
      <div class="row-fluid">

        <div class="span12 col-xs-12 comment-text" id="comment-5-edit" contenteditable="false">

          <p><?php echo $postComment; ?></p>

        </div>

      </div>  

  <?php 

   if($commentUserID == $currentUserID && $currentUserID != 0)

   {

  ?>    

      <div class="row">

        <div class="comment-status span2 col-sm-12 col-md-6"></div>

            <div class="comment-moderate span6 col-sm-12 col-md-6 text-right">

          <span class="comment-moderate">        

            <form id="" method="post" class="commentDelete" action="<?php echo $actionPath_delete; ?>" >

              <input type="hidden" name="commentID" value="<?php echo $commentID; ?>">

              <input type="hidden" name="currentPage" value="<?php echo $currentPage; ?>">

              <input type="submit" name="" value="Delete" class="comment_deleteButton">  

            </form>            

          </span>

      </div>

      </div>  

  <?php } ?>    



    </div>

    </li>

  <?php 

      }

    }

  }

  ?>    

  </ul>

</div>



   

          

      

    

        <?php

            // Free result set

            mysqli_free_result($result);

        } else{

            echo "No records matching your query were found.";

        }

    

    }

     else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

  }

  ?>
