<?php
use yii\bootstrap4\Html;
/* @var $this yii\web\View */

$this->title = $model['title'];
?>
<div class="site-detail-news">

<div id="detail-of-news" class="text-justify overflow-hidden">
    <?php
    echo "<h5>".Html::a($model['title'],['detail', 'guid'=>$model['guid']])."</h5>";
    echo "<small>".$model['author']." at ".date('d-M-Y', strtotime($model['pubDate']))."</small>";
    echo "<div>";
        echo $model['description'];
    echo "</div>";
    echo "<small>".implode(', ', $model['categories'])."</small>";
    ?>
</ul>
    
</div>
