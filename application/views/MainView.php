<h1>Доска обсуждений: программирование</h1>
<div class="b-top-actions clearfix">
    <a href="Post/Add" class="button button-action">Создать новый тред</a>
  </div>
<?php
if(!empty($data)){
  	foreach ($data as $row){
  		?>
<div class="b-threads-list">
    <div class="b-thread">
        <div class="b-post first-post">            
  			<div class="post-number"><?="#".$row['id']?></div>
                <h2 class="thread-topic"><?=$row['title']?></h2>
                <p><?=$row['content']?></p>
                <div class="b-comment">
                	<?php
                	if(!empty($row['coment'])){
                		foreach($row['coment'] as $coment){
                			?>
                	<div class="post-number"><?="#".$coment['id']?></div>
                	<p><?=$coment['content']?></p>
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
<hr>
<?php
    }
} else {
	echo "<p>Нет ни одного треда. Хотите создать первый тред? </p>";
}