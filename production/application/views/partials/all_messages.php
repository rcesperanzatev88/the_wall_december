<? foreach ($data as $messages) { ?>
    <div class = "message_block">
        <p class = "username" > 
            <?= $messages["creator"] ?> <?= $messages["created_at"] ?> 
            <?= $this->user_login["id"] == $messages["message_user_id"] ? '<a href= "#" data-attr-id = '. $messages["id"].' data-attr-form = "delete_message"> delete</a> ' : '' ?> 
        </p>
        <p class = "content"><?= $messages["message"] ?> </p>

        <form id = "form_comment" action = "post_comment" method = "post">
                <div class = "error"></div>
                <textarea class = "message" name = "message"></textarea>
                <input type = "hidden" id = "message_id" name = "message_id" value = "<?= $messages["id"] ?>">
                <input type = "submit" class = "submit_comment" value = "Comment">
        </form>

        <div class = "comment_container">
<? foreach (json_decode($messages["comments"]) as $comments) { 
        if(! empty($comments-> creator)) {
?>
            <div class = "comment_block">
                <p class = "username" > 
                    <?= $comments->creator ?> <?= $comments->created_at ?> 
                    <?= $this->user_login["id"] == $comments->message_user_id ? '<a href= "#" data-attr-id = '. $comments->id.' data-attr-form = "delete_comment"> delete</a> ' : '' ?> 
                </p>
                <p class = "content"><?= $comments->message ?> </p>
            </div>
<? } 
        }
?>
        </div>
    </div>
<? } ?>


        <form id = "delete_comment" action = "delete_comment" method = "post" class = "hidden">
                <input type = "hidden" class = "delete_id" name = "id" value = "">
                <input type = "submit" value = "Post">
        </form>

        <form id = "delete_message" action = "delete_message" method = "post" class = "hidden">
                <input type = "hidden" class = "delete_id" name = "id" value = "">
                <input type = "submit" value = "Post">
        </form>