<article class="faq" id="<?= $faq[$i]['faq_id'] ?>">
    <figure class="icon">Q</figure>
    <div class="wrapper">
        <header>
            <?= $faq[$i]['faq_title'] ?>
            <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 ) : ?>
                <div class="tools">
                    <a href="?page=tools-faq"><i class="fa fa-edit"></i>Edit</a>
                    <span id="<?= $faq[$i]['faq_id'] ?>" class="delete" data-item-type="faq"><i class="fa fa-trash-o"></i></span>
                </div>
            <?php endif ?>
        </header>
        <p><?= $faq[$i]['faq_description'] ?></p>
        <?php if( isset($_COOKIE['voted']) ) : ?>
            <aside>You have already voted</aside>
        <?php else : ?>
            <aside>Was this answer helpful?<a href="#" class="faq-yes">Yes</a><a href="#" class="faq-no">No</a></aside>
        <?php endif ?>
    </div>
</article>