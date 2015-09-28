<?php
/**
 * Functions
 */

// Extract number from string. Used in "Amenities"

function extract_numbers($stringNumbers){
    preg_match_all('/([\d]+)/', $stringNumbers, $match);
    return $match[0];
}

// Find if the parent comment has reply

function findReplies($a){
    $commentsReplies = Db::queryAll('SELECT * FROM comments_table WHERE item_id=? && reply_to=?', $_GET['item'], $a);
    for($i=0; $i<count($commentsReplies); $i++){
        $date = date( 'd.m Y', strtotime($commentsReplies[$i]['comment_date']) );
        echo('
            <li class="comment">
                <figure>
                    <div class="image">
                        <img alt="" src="' . $commentsReplies[$i]['image'] . '">
                    </div>
                </figure>
                <div class="comment-wrapper">
                    <div class="name pull-left">' . $commentsReplies[$i]['author_name'] . '</div>
                    <span class="date pull-right"><span class="fa fa-calendar"></span>' . $date . '</span>
                    <div class="rating rating-individual" data-score="' . $commentsReplies[$i]['rating'] . '"></div>
                    <p>' . $commentsReplies[$i]['comment_content'] . '</p>
                    <a href="#" class="reply"><span class="fa fa-reply"></span>Reply</a>
                    <hr>
                    <ul class="comment-reply">'); findReplies($commentsReplies[$i]['comment_id']); echo('</ul>
                </div>
            </li>
        ');
    }
}

function formatPrice($currency, $price, $locale){
    if($locale == 'EU'){
        $thousandSeparator = ' ';
        echo(htmlspecialchars(htmlspecialchars(number_format($price,0,',',$thousandSeparator)) . $currency));
    }
    elseif($locale == 'US'){
        $thousandSeparator = '.';
        echo(htmlspecialchars($currency . htmlspecialchars(number_format($price,0,',',$thousandSeparator))));
    }
}

// Check if the features are checked

function checkFeatures($featuresArray, $featureID){
    $state = '';
    for( $a=0; $a<count($featuresArray); $a++ ) {
        if( $featuresArray[$a] == $featureID ) {
            $state = 'checked';
        }
        else {
        }
    }
    return $state;
}