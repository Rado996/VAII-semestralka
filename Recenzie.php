

<!DOCTYPE html>
<html lang="sk">
<head>

    <?php include('Head.php');

    ?>
    <style>
        <?php include 'css/1.css'; ?>
    </style>
    <script src="JS/Script2.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-3 comments-section">


            <form class="clearfix" id="comment_form">
                <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                <button class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitComment">Pridať recenziu</button>
            </form>


            <div>
                <?php if (isset($comments)):
                    foreach ($comments as $comment): ?>
                        <div class="comment clearfix" id="comment<?php$comment['Comment_ID']?>">
                            <div class="comment-details">
                                <?php $CommentID = $comment['Comment_ID'] ; ?>
                                <p>  <!-- vypisať autora comentara  -->  </p>
                                <span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["Created_at"])); ?></span>
                                <p><?php echo $comment['Body']; ?></p>
                                <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentMng" name="cmmtDelete" id="cmmtDelete">Vymazať</a>
                                <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentMng" name="cmmtEdit" id="cmmtEdit">Upraviť</a>
                            </div>
                        </div>
                        <div class="comment clearfix edit_comment_form" id="editComment<?php$comment['Comment_ID'] ; ?>">
                            <div class="comment-details">
                                <textarea id="editComment<?php echo $comment['id']; ?>"><?php echo $comment['Body']; ?></textarea>
                                <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentMng" name="cmmtDelete" id="cmmtDelete">potvrdit</a>
                                <a  data-cmid="<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentMng" name="cmmtEdit" id="cmmtEdit">zrusit</a>
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