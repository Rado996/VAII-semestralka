

<!DOCTYPE html>
<html lang="sk">
<head>

    <?php include('Head.php');

    ?>
    <style>
        <?php include 'css/1.css'; ?>
    </style>
    <script src="JS/script.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-3 comments-section">

            <?php if(isset($_SESSION['editBody'])): ?>

            <form class="clearfix" id="comment_form">
                <textarea name="comment_text" id="comment_text"  class="form-control" cols="30" rows="3"><?php echo $_SESSION['editBody'] ?></textarea>
                <button class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitComment">Upraviť recenziu</button>
            </form>
            <?php else: ?>
            <form class="clearfix" id="comment_form">
                <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                <button class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitComment">Pridať recenziu</button>
            </form>
            <?php endif ?>

            <div>
                <?php if (isset($comments)):
                    foreach ($comments as $comment): ?>
                        <div class="comment clearfix">
                            <div class="comment-details">
                                <?php $CommentID = $comment['Comment_ID'] ; ?>
                                <span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["Created_at"])); ?></span>
                                <p><?php echo $comment['Body']; ?></p>
                                <a href="Recenzie.php?delete=<?php echo $comment['Comment_ID']; ?>" class="btn btn-warning commentMng" name="cmmtDelete" id="cmmtDelete">Vymazať</a>
                                <a href="Recenzie.php?edit=<?php echo $comment['Comment_ID']; ?>"class="btn btn-warning commentMng" name="cmmtEdit" id="cmmtEdit">Upraviť</a>
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