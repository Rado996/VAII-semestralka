
<!DOCTYPE html>
<html lang="sk">
<head>

    <?php include('Head.php');  ?>

    <script src="JS/Script1.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-3 comments-section">

        <?php if(isset($_SESSION["userName"])) :?>
            <form class="clearfix" id="comment_form">
                <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                <button class="btn btn-primary btn-sm pull-right" name="submitComment" data-author="<?php echo($_SESSION["userName"])?>" id="submitComment">Pridať recenziu</button>
            </form>
        <?php else:  ?>
            <form class="clearfix" id="comment_form">
                <p id="not_logged_in" cols="30" rows="10"> Pred pridaním recenzie sa musíte prihlásiť </p>
            </form>
        <?php endif ?>
            <div>
                <?php if (isset($comments)):
                    foreach ($comments as $comment): ?>
                        <div class="comment clearfix" id="comment<?php echo($comment['Comment_ID'])?>">
                            <div class="comment-details">
                                <p id="author" data-author="<?php echo($comment["Created_by"]) ?>" > <?php echo($comment["Created_by"])?>  </p>
                                <span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["Created_at"])); ?></span>
                                <p><?php echo $comment['Body']; ?></p>
                                <?php if(isset($_SESSION["userName"])) {
                                    if(($_SESSION["userName"] == $comment["Created_by"]) || ($_SESSION["userName"] == "Admin") ){ ?>
                                        <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentDeleteBtn"  id="cmmtDelete">Vymazať</a>
                                        <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentEditBtn"  id="cmmtEdit">Upraviť</a>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="comment clearfix edit_comment_form" id="editComment<?php echo($comment['Comment_ID']) ; ?>">
                            <div class="comment-details">
                                <textarea class="form-control" cols="10" rows="1" id="editCommentArea<?php echo $comment['Comment_ID']; ?>"><?php echo $comment['Body']; ?></textarea>
                                <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentSendEditBtn"  id="cmmtEditSend">Odoslať</a>
                                <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentCancelEditBtn"  id="cmmtEditCancel" >Zrusit</a>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>


</body>
</html>