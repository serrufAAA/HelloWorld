<head>
    <meta charset="UTF-8">
    <title>Программирование // доска обсуждений</title>
    <link rel="stylesheet" href="./css/board-style.css">
</head>
<body>
    <div class="l-header">
        <div class="wrap">
            <h1>Программирование</h1>
        </div>
        <div class="overlay"></div>
    </div>

    <div class="page-threads-list">
        <div class="b-top-actions clearfix">
            <a href="Post/Add" class="button button-action">Создать новый тред</a>
        </div>

<?php
if(!empty($posts)) :
   foreach ($posts as $row) :
   ?>
        <div class="b-threads-list">
            <div class="b-thread">
                <div class="b-post first-post">
                    <div class="post-number"><?="#".core_XSS::h($row->id)?></div>
                    <h2 class="thread-topic"><?=core_XSS::h($row->title)?></h2>
                    <p><?=core_XSS::h($row->content)?></p>
                    <div class="b-post-last-comments">
<?php
$comsToPost = array();
foreach($comments as $coment):
    if($coment->post_id == $row->id):
        $comsToPost[] = $coment;
    endif;
endforeach;
$count=count($comsToPost);
if(!empty($comsToPost)) :
    if($count > 3){
        $comsToPost=array_slice($comsToPost, $count-3, 3);
        $misCom=$count-3;
        echo "<div class='b-post-info-line'>";
        if($misCom == 1 || ($misCom%100 != 11 && $misCom%10 == 1)){
            echo "Пропущен $misCom комментарий";
        } elseif($misCom < 5 || (($misCom%100 < 12 || $misCom%100 > 21) && ($misCom%10 > 1 || $misCom%10 <4))){
            echo "Пропущено $misCom комментария";
        } else {
            echo "Пропущено $misCom комментариев";
        }
        echo "</div>";            
    }
    foreach($comsToPost as $comToPost):
?>
                        <div class="b-comment">
                            <div class="post-number"><?="#".core_XSS::h($comToPost->id)?></div>
                            <p><?=core_XSS::h($comToPost->content)?></p>
                        </div>
<?php
    endforeach;
else :
?>
                        <p>Коментов нет</p>
<?php
endif;
?>
                    </div>
                </div>
            </div>
            <div class="b-post-actions clearfix">
                <form method='post'>
                    <button class="button-action button-reply" formaction="Comment/Add" name="post_id" value="<?=core_XSS::h($row->id)?>">Добавить комментарий</button>
                    <button class="button-action button-show-thread" formaction="Tread" name="tread_id" value="<?=core_XSS::h($row->id)?>">Перейти в тред</button>
                </form>
            </div>

        </div>

<?php
    endforeach;
else :
echo "<p>Нет ни одного треда. Хотите создать первый тред? </p>";
endif;
?>

        <div class="b-pager"> 
<?php
for( $i=1; $i <= $pagesCount; $i++){
    if($i == $_GET['p']){
        echo "<span class='current'>$i</span>";
    } else {
        echo "<a href='?p={$i}'>$i</a>";
    }
}
?>
        </div>
    </div>
<?php
$info = core_QueryInfo::getInstance();
if($infoObject = $info->getInfo()){
    $totalTime = 0;
    foreach($infoObject as $row){
        echo "Запрос " . $row->sql . " Время " . $row->time . " мсек<br>";
        $totalTime+=$row->time;
    }
echo "Суммарное время {$totalTime} мсек<br>";
}
?>

</body>