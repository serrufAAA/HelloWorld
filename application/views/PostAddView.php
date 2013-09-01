<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/board-style.css">
</head>
<body>
<div class="l-header-clean">
    <h1>Начать новый тред</h1>
</div>
<div class="page-add-form">
   <form action="" method=post class="b-add-thread-form b-big-form">
        <div class="row">
            <label class="row-label" for="add-title">Заголовок:</label>
            <input type="text" id="add-title" class="input-wide" name='tittle'><?php if(!empty($errorTitle)) echo $errorTitle  ?><br>
            <div class="row-hint">не обязательно</div>
        </div>

        <label class="row-error" for="add-text">
            Пожалуйста, не используйте слишком сложные слова в тексте поста.
        </label>
        
        <div class="row">
            <div class="row-comment">Пожалуйста, не пишите здесь ничего плохого, иначе наши суровые 
                модераторы вынуждены будут лишить вас этой возможности.</div>
            <label class="row-label" for="add-text">Текст поста:</label>
            <textarea id="add-text" class="textarea-wide textarea-large" name='content'></textarea><?php if(!empty($errorContent)) echo $errorContent ?><br>
        </div>

        <div class="row">            
            <label class="row-label" for="add-name">Ваше имя:</label>
            <input type="text" id="add-name" class="input-wide">
            <div class="row-hint">не обязательно</div>
       </div>

       <div class="row row-buttons">
            <button class="button-action button-main">Создать тред</button>
            <a href="../" class="button-left back-link">← вернуться на главную</a>
       </div>
   </form>
</div>
<body>