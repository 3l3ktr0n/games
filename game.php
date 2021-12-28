<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!defined('e107_INIT'))
{
	require_once("../../class2.php");
}

class games_front
{

	public function run()
	{
        global $gameID;

		$sql = e107::getDb(); 					// mysql class object
		$tp = e107::getParser(); 				// parser for converting to HTML and parsing templates etc.
		$frm = e107::getForm(); 				// Form element class.
		$ns = e107::getRender();				// render in theme box.

		$text = '';

        $sc = e107::getScBatch('games', true);
        $template = e107::getTemplate('games');

        $gameID = (isset($_GET['id']) && is_numeric($_GET['id'])) ? abs(round($_GET['id'])) : 0;

		if($row = $sql->retrieve("games", "*", "WHERE id = '{$gameID}'"))
        {
            $data = array(
                'game_id'  => $gameID,
                'game_sef' => $row['Slug'],
                'page'     => $_GET['page'], 
            );

            $url = e107::url('games', 'game', $data);
            $pageurl = e107::url('games', 'page', $data);
            
            echo $url . '<BR>';
            echo $pageurl;
            
            //print_a($row);
            echo $tp->parseTemplate($template['start'], true, $sc);

            $sc->setVars($row); // send the value of the $row to the class.
            echo $tp->parseTemplate($template['item'], false, $sc); // parse the 'item'

            echo $tp->parseTemplate($template['end'], true, $sc);

            echo $this->getReviews($gameID);

            echo $this->getUserReviewStatistics($gameID);

            //echo $this->getUserReviews($gameID);

            echo $this->getNews($gameID);
     	}
        else
        {
	        //echo "Game not found";
            e107::redirect();
	        exit;
        }

    }

    public function getReviews($gameID)
	{

        $sql = e107::getDb();
        $tp = e107::getParser();

		$sc = e107::getScBatch('games', true);
        $template = e107::getTemplate('games');

        $gameID = (isset($_GET['id']) && is_numeric($_GET['id'])) ? abs(round($_GET['id'])) : 0;

        //$reviewGameQuery = 'WHERE FIND_IN_SET("'.$gameID.'", review_game)';

        if($sql->gen('SELECT * FROM #reviews WHERE FIND_IN_SET("'.$gameID.'", review_game)'))//gen('SELECT * FROM #reviews ' .$reviewGameQuery)
        {
            while($review = $sql->fetch())
            {//print_a($review);
			    $sc->setVars($review);
			    echo $tp->parseTemplate($template['review'], true, $sc);
		    }

	    }//end if
        else
        { 
            echo "<div class='alert alert-danger text-center'>We have no review for this game yet. If you've played it, write a review and tell us what you think!</div>"; 
        }
    
    }

    public function getUserReviewStatistics($gameID)
    {

        $sql = e107::getDb();
        $tp = e107::getParser();

        $sc = e107::getScBatch('games', true);
        $template = e107::getTemplate('games');

        //$gameID = (isset($_GET['id']) && is_numeric($_GET['id'])) ? abs(round($_GET['id'])) : 0;

        /*$rating = "";

        if($sql->gen("SELECT rating FROM #game_comment WHERE game_id =" .$gameID))
        {
		    $ratingResult = "";

			while($row_rating = $sql->fetch())
            {
                //$sc->setVars($row);
                //echo $tp->parseTemplate($template['userreviewstatistics'], true, $sc);
				if($row_rating["rating"] != 0)
                {
					$ratingResult = $row_rating["rating"];							    	
					$sum_of_rating += $ratingResult;
					$sum_of_rating_multi5 = $sum_of_rating*5;
                    $numberOfUsers_Array[] = $ratingResult;
				}
			}

            $numberOfUsers_Array_Count = array_count_values($numberOfUsers_Array);
            $numberOfUsers_Array_Count = array_sum($numberOfUsers_Array_Count);
            $numberOfUsers = $numberOfUsers_Array_Count*5;
            $rating = $sum_of_rating_multi5/$numberOfUsers;

            $userReviewCount = $numberOfUsers_Array_Count;

            if($rating != "")
            {
                echo "<BR>rating<BR>" . round($rating, 1) . "<BR><BR>";
            }
            else
            {
                echo "--<BR>";
            }

            $commentsNum = $numberOfUsers_Array;

            echo "Player Reviews <BR>";
            
            $totalComments = $commentsNum;

            $totalComments = count($totalComments);

            if($totalComments != 0)
            {
                $numberCommentsNum = "";
                $commentPercentage = "";
?><div class="container-fluid" style="background-color: #efefef; border-radius: 5px;"><?php
                // get scores/comments for each rating level (10-1)
                for($i=10; $i>=1; $i--)
                {
                    $numberCommentsNum = $sql->select('game_comment', '*', 'rating = "'.$i.'" AND game_id = "'.$gameID.'"');

                    $commentPercentage = ((int)$numberCommentsNum > 0) ? (((int)$numberCommentsNum / (int)$totalComments)*100) : 0;
                    
                    //echo $i . " (" . $numberCommentsNum . ") "; --- shortcode vaja tehaaa
*/
                    //$sc->setVars($numberCommentsNum);
                    echo '<div class="container-fluid" style="background-color: #efefef; border-radius: 5px;">';
                    echo $tp->parseTemplate($template['userreviewstatistics'], true, $sc);
                    echo '</div>';
/*
                    ?>
                    <!--<div class="container-fluid" style="background-color: #efefef; border-radius: 25px;">-->
                        <div class="row">
                            <div class="col-sm-2">
                                '. $i . "(" .$numberCommentsNum. ")" .'
                            </div>
                            <div class="col-sm-10">
                                <div class="" data-width="10" style="background-color: #ccc; width: width: '.$commentPercentage.'%;"> '.round($commentPercentage, 1).' </div>
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$commentPercentage.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$commentPercentage.'%">
                                <span class="sr-only">'.$commentPercentage.'</span>
                                '.round($commentPercentage, 1).'  </div>
                            </div>
                        </div>
                    <!--</div>-->
                    <?php*/
             /*   }
                echo "<BR> average of " . $userReviewCount . " rating(s)<BR><BR>";
?></div><?php
            }
        }*/
    }

    public function getUserReviews($gameID)
    {

        $sql = e107::getDb();
        $tp = e107::getParser();

        $sc = e107::getScBatch('games', true);
        $template = e107::getTemplate('games');

        //$gameID = (isset($_GET['id']) && is_numeric($_GET['id'])) ? abs(round($_GET['id'])) : 0;

        $rating = "";

        if($sql->gen("SELECT rating FROM #game_comment WHERE game_id =" .$gameID))
        {
		    $ratingResult = "";

			while($row_rating = $sql->fetch())
            {
				if($row_rating["rating"] != 0)
                {
					$ratingResult = $row_rating["rating"];							    	
					$sum_of_rating += $ratingResult;
					$sum_of_rating_multi5 = $sum_of_rating*5;
                    $numberOfUsers_Array[] = $ratingResult;
				}
			}

            $numberOfUsers_Array_Count = array_count_values($numberOfUsers_Array);
            $numberOfUsers_Array_Count = array_sum($numberOfUsers_Array_Count);
            $numberOfUsers = $numberOfUsers_Array_Count*5;
            $rating = $sum_of_rating_multi5/$numberOfUsers;

            $userReviewCount = $numberOfUsers_Array_Count;

            if($rating != "")
            {
                echo "<BR>rating<BR>" . round($rating, 1) . "<BR><BR>";
            }
            else
            {
                echo "--<BR>";
            }

            $commentsNum = $numberOfUsers_Array;

            echo "Player Reviews <BR>";
            
            $totalComments = $commentsNum;

            $totalComments = count($totalComments);

            if($totalComments != 0)
            {
                $numberCommentsNum = "";
                $commentPercentage = "";
?><div class="container-fluid" style="background-color: #efefef; border-radius: 5px;"><?php
                // get scores/comments for each rating level (10-1)
                for($i=10; $i>=1; $i--)
                {
                    $numberCommentsNum = $sql->select('game_comment', '*', 'rating = "'.$i.'" AND game_id = "'.$gameID.'"');

                    $commentPercentage = ((int)$numberCommentsNum > 0) ? (((int)$numberCommentsNum / (int)$totalComments)*100) : 0;
                    
                    //echo $i . " (" . $numberCommentsNum . ") "; --- shortcode vaja tehaaa

                    ?>
                    <!--<div class="container-fluid" style="background-color: #efefef; border-radius: 25px;">-->
                        <div class="row">
                            <div class="col-sm-2">
                                <?php echo $i . " (" . $numberCommentsNum . ") "; ?>
                            </div>
                            <div class="col-sm-10">
                                <div class="" data-width="10" style="background-color: #ccc; width: <?php echo $commentPercentage;?>%;"> <?php echo round($commentPercentage, 1); ?> </div>
                            </div>
                        </div>
                    <!--</div>-->
                    <?php
                }
                echo "<BR> average of " . $userReviewCount . " rating(s)<BR><BR>";
?></div><?php                                                                        
                //echo "<BR> average of " . $userReviewCount . " rating(s)<BR><BR>";
            
                $sql->gen("SELECT * FROM #game_comment WHERE game_id =" .$gameID);

                while($row = $sql->fetch())
                {//shortcodei ära
                    $commentID = $row['id'];
                    echo $row['title'] . "<BR>";
                    echo e107::getDateConvert()->convert_date($row['datestamp'], 'long') . " ";
                    echo $row['rating'] . " ";
                    echo $row['platform'] . "<BR>";
                    $commentPost = $row['review'];
                    $userReviewURL = SITEURL."user_review.php?id=".$commentID;
                    $commentPost = strip_tags($commentPost);

                    if (strlen($commentPost) > 500)
                    {
                        // truncate string
                        $stringCut = substr($commentPost, 0, 500);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $commentPost = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $commentPost .= "... <a href='".$userReviewURL."'>Read More</a>";
                    }
                    echo $commentPost . "<BR><BR>";
                }//end while row

            }
            else
            {
                echo "<div class='alert alert-danger text-center'>No reviews or ratings from players entered.</div>";
            }
        }
   
    }

    public function getNews($gameID)
    {

        $sql = e107::getDb();
        $tp = e107::getParser();

		$sc = e107::getScBatch('games', true);
        $template = e107::getTemplate('games');

        //$gameID = (isset($_GET['id']) && is_numeric($_GET['id'])) ? abs(round($_GET['id'])) : 0;
 
        if($row_news_array = $sql->retrieve('games', 'NewsTagsSELECTED', 'id =' .$gameID))
        {
            
            $row_news_array = explode(",", $row_news_array);     
                
            foreach($row_news_array as $row_news_val)
            {   
                $news_id_array = $sql->select('news', 'news_id', 'news_meta_keywords LIKE "%'.$row_news_val.'%"');
                    
                if(!empty($row_news_val) && $news_id_array)
                {    
                    while($news_id_val = $sql->fetch())
                    {
                        $news_id_val_array[] = $news_id_val[news_id];
                    }     
                }      
            }

            $news_id_val_array = array_unique($news_id_val_array);

            $news_tag_id_array = $news_id_val_array;

            foreach($news_tag_id_array as $NewsIds)
            {

                $sql->select('news', '*', 'news_id =' .$NewsIds);

                while($article = $sql->fetch())
                {
                    $sc->setVars($article);
			        echo $tp->parseTemplate($template['article'], true, $sc);
                    /*echo $result_newsValue['news_title'] . "<BR>";
                    echo $result_newsValue['news_id'] . "<BR>";
                    echo $result_newsValue['news_meta_keywords'] . "<BR>";
                    $news_id = $result_newsValue['news_id'];
                    $newsLink = SITEURL."news.php?extend.".$news_id;
                            /*$news_id = $result_newsValue['news_id'];
                            $news_sef = $result_newsValue['news_sef'];
                            $news_category = $result_newsValue['news_category'];
                            $category_sef = $result_newsValue['category_sef'];
                            $news_meta_keywords = $result_newsValue['news_meta_keywords'];
                            $newsLink = "news/".$category_sef.$news_sef;*/
                    /*echo $result_newsValue['news_datestamp'] . "<BR>";
                    $news_thumbnail = $result_newsValue['news_thumbnail'] . "<BR>";
                    $news_thumbnail_array = explode(",", $news_thumbnail);
                    $news_thumbnail = $news_thumbnail_array[0];
                    $imagePath = str_replace("{e_MEDIA_IMAGE}","", $news_thumbnail);
                    $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;       
                    echo $newsLink . "<BR>"; 
                    echo $imageURL . "<BR>";              
                    echo "<BR>";*/
                }

            }

        }
        else
        {
            echo '<div class="alert alert-danger text-center">No news found for this game.</div>';
        }

    }

}

$gamesFront = new games_front;

require_once(HEADERF);
$gamesFront->run();
require_once(FOOTERF);

exit;

?>
