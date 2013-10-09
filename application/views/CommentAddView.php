<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/board-style.css">
</head>
<body>
<div class="l-header-clean">
    <h1>Добавить коменты</h1>
</div>
<div class="page-add-form">
   <form action="" method='post' class="b-add-thread-form b-big-form">      
        <div class="row">
            <label class="row-label" for="add-text">Текст поста:</label>
            <textarea id="add-text" class="textarea-wide textarea-large" name='content'></textarea><?php if(!empty($errorContent)) echo $errorContent ?><br>
        </div>

        <input type=hidden name='post_id' value="<?=$_POST['post_id']?>">
        <input type=hidden name='refer' value="<?=$_SERVER['HTTP_REFERER']?>">

       <div class="row row-buttons">
            <button class="button-action button-main" name="submit">Давить комент</button>
            <a href="../" class="button-left back-link">← вернуться на главную</a>
       </div>
   </form>
</div>
<body>