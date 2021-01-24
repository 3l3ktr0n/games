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

// make sure gameID exists
$gameID = isset($_GET['id']) ?? 0;

if($gameID > 0){
    if($result = mysqli_query($link, 'SELECT id FROM e107_games where id = "'.$gameID.'"')){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $gameID = $row['id'];
            } // end while rows
        } // endif rows
    } // endif result

    if($gameID != "") {

        if($result = mysqli_query($link, "SELECT * FROM e107_games")) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {

                    if($row['id'] == $gameID) { ?>

                        <h2 class="singleTitle"><?php echo $row['Title'];?></h2>

                        <!-- <div class="row ">
                        <div class="game_tabing">
                        <ul>
                        <li data-id="overview">Overview</li>
                        <li data-id="about">About</li>
                        <li data-id="review">Review</li>
                        <li data-id="news">News</li>
                        <li data-id="screenshots">Screenshots</li>
                        <li data-id="comment">Discussions</li>
                        </ul>
                        </div>
                        </div>   -->

                        <div class="row sep_section" id="overview">

                            <div class="col-sm-6">
                                <?php
                                $imagePath = str_replace("{e_MEDIA_IMAGE}","",$row['Media']);
                                $imageURL = SITEURL.e_MEDIA_IMAGE.$imagePath;
                                ?>

                                <img src="<?php echo $imageURL; ?>" alt="" class="single_image">

                                <div class="single_game_rating_top">

                                    <?php
                                    $rating = "";
                                    if($result_rating = mysqli_query($link, "SELECT commentRating FROM e107_game_comment where postID=".$gameID)) {

                                        $num_rows = $result_rating->num_rows;

                                        $userReviewCount = mysqli_num_rows($result_rating);

                                        if(mysqli_num_rows($result_rating) > 0) {

                                            $commentLoop = 0;
                                            $sum_of_rating = 0;
                                            $ratingResult = "";

                                            while($row_rating = mysqli_fetch_array($result_rating)) {



                                                if($row_rating["commentRating"] != 0) {

                                                    $ratingResult = $row_rating["commentRating"];

                                                    $sum_of_rating += $ratingResult;

                                                    $sum_of_rating_multi5 = $sum_of_rating*5;



                                                    $numberOfUsers_Array[] = $ratingResult;

                                                } // endif rating
                                            } // endif while rating
                                        } //endif rows
                                    } // endif rating result

                                    $numberOfUsers_Array_Count = array_count_values($numberOfUsers_Array);

                                    $numberOfUsers_Array_Count = array_sum($numberOfUsers_Array_Count);

                                    $numberOfUsers = $numberOfUsers_Array_Count*5;

                                    $rating = $sum_of_rating_multi5/$numberOfUsers;
                                    if($rating != "" && $num_rows > 0 ){

                                        $rating = number_format($rating, 1); ?>



                                        <div class="rating_box">
                                            <h4>Game rating</h4>
                                            <?php
                                            $rating_image = SITEURL."e107_plugins/games/images/rating_star.png";
                                            ?>
                                            <div class="rating_bg" style="background:url(<?php echo $rating_image; ?>);">
                                                <?php echo $rating; ?>
                                            </div>
                                        </div>
                                    <?php } //endif game id ?>
                                </div> <!-- single game rating top -->
                            </div> <!-- col-sm-6 -->

                            <div class="col-sm-6">

                                <h3>Overview:</h3>

                                <ul class="overview_list">

                                <?php if($row["Known"] != ""){ ?>

                                    <li><strong>Also known as:</strong><span> <?php echo $row["Known"]; ?></span></li>

                                <?php } ?>

                                <?php if($row["Developer"] != ""){ ?>

                                    <li><strong>Developer:</strong><span> <?php echo $row["Developer"]; ?></span></li>

                                <?php } ?>

                                <?php if($row["ReleaseDate"] != ""){ ?>

                                    <li><strong>Release Date:</strong><span> <?php echo $row["ReleaseDate"]; ?></span></li>

                                <?php } ?>

                                <?php if($row["Series"] != ""){ ?>

                                    <li><strong>Series:</strong><span> <?php echo $row["Series"]; ?></span></li>

                                <?php } ?>

                                <?php if($row["Known"] != ""){ ?>

                                    <li><strong>Number of players:</strong><span> <?php echo $row["Players"]; ?></span></li>

                                <?php } ?>

                                </ul>

                            </div> <!-- col-sm-6 -->

                            <div class="row game_content sep_section" id="content">

                                <div class="col-sm-12">

                                    <div class="single_content">

                                        <?php echo $row["Content"]; ?>

                                    </div>

                                </div>

                            </div>
                    <?php
                    } // endif rowID
                } // end while
            } // end if rows
        } // endif result
    } // endif gameid != ''
} // endif gameID > 0
