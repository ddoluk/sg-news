<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <?php foreach ($data as $key => $news): ?>
            <h3><?php echo $news['title'] ?></h3>
            <p><?php echo $news['description'] ?>
                <a href="<?php echo $news['link'] ?>">Детальніше</a>
            </p>
            <div>
                <span class="badge"><?php echo $news['pub_date'] ?></span>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="text-center">
            <?php echo $pagination->get(); ?>
        </div>
    </div>
</div>