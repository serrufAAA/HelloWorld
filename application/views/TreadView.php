<head>
    <meta charset="UTF-8">
    <title><?=$tread->title?>// программирование</title>
    <link rel="stylesheet" href="css/board-style.css">
</head>
<body>

<div class="l-header">
    <div class="wrap">
        <h1><?=$tread->title?></h1>
    </div>
    <div class="overlay"></div>
</div>

<div class="page-thread">

    <div class="b-threads-list">
        <div class="b-thread">
            <div class="b-post first-post">            
                <div class="post-number">#<?=$tread->id?></div>
                <p><?=$tread->content?></p>
            </div>
<?php
foreach($comments as $comment){
	?>
			<div class="b-post">            
                <div class="post-number">#<?=$comment->id?></div>
                
                <p><?=$comment->content?></p>        
            </div>
	<?php
}
?>
			<div class="b-post-actions clearfix">
				<form method='post'>
                	<button class="button-action button-reply" formaction="./Comment/Add" name="post_id" value="<?=core_XSS::h($tread->id)?>">Добавить комментарий</button>
                </form>
                <a href="./" class="button-left back-link">← вернуться на главную</a>
            </div>

        </div>
    </div>
</div>

<body>