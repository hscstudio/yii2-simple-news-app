<?php
use yii\bootstrap4\Html;
/* @var $this yii\web\View */

$this->title = 'News App';
?>
<div class="site-index">

<ul id="list-of-news" class="list-unstyled text-justify overflow-hidden">
    <?php
    foreach($model as $news){
        echo "<li>";
        echo "<h5>".Html::a($news['title'],['detail', 'guid'=>$news['guid']])."</h5>";
        echo "<p>";
        echo "<small>".$news['author']." at ".date('d-M-Y', strtotime($news['pubDate']))."</small><br>";
        echo Html::img($news['thumbnail'], ['class'=>'rounded img-fluid']);
        echo substr(strip_tags($news['description']),0,255)."...<br>";
        echo "<small>".implode(', ', $news['categories'])."</small>";
        echo "</p>";
        echo "</li>";
    }
    ?>
</ul>
    
</div>
