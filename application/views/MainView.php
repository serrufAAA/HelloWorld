<h1>Доска обсуждений: программирование</h1>
<div class="b-top-actions clearfix">
    <a href="Post/Add" class="button button-action">Создать новый тред</a>
  </div>
<?php
if(!empty($posts)){
  	foreach ($posts as $row){
  		?>
<div class="b-threads-list">
    <div class="b-thread">
        <div class="b-post first-post">            
  			<div class="post-number"><?="#".$row['id']?></div>
                <h2 class="thread-topic"><?=$row['title']?></h2>
                <p><?=$row['content']?></p>
                <div class="b-comment">
<?php
$comsToPost = array();
foreach($comments as $coment){
    if($coment['post_id'] == $row['id']){
        $comsToPost[] = $coment; 
    }
}
if(!empty($comsToPost)){ 
    foreach($comsToPost as $comToPost){              				
        ?>
<div class="post-number"><?="#".$comToPost['id']?></div>
<p><?=$comToPost['content']?></p>
<?php
    }
} else {
    echo "Коментов нет";
}
?>
                </div>
        </div>
    </div>
</div>
<div class="b-post-actions clearfix">
<form method='post'>
    <button class="button-action button-reply" formaction="Comment/Add" name="post_id" value="<?=$row['id']?>">Добавить комментарий</button>
</form>
    <button class="button-action button-show-thread">Перейти в тред</button>
</form>
</div>
<hr>
<?php
    }
} else {
	echo "<p>Нет ни одного треда. Хотите создать первый тред? </p>";
}