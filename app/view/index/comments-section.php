<h4 class="uk-text-bold uk-margin-small-bottom uk-heading-line"><span>Comments</span></h4>
<?php
if (is_array($this->view_data['comments']) && sizeof($this->view_data['comments']) > 0) {
    foreach ($this->view_data['comments'] as $key => $comment) {
        ?>
        <article class="uk-section uk-section-small uk-padding-remove-top">
            <header>
                <p class="uk-article-meta">
                <div class="uk-clearfix">
                    <div class="uk-float-left">
                        <span data-uk-icon="icon: user"></span> |
                        <?php echo sprintf("%s (%s)", $comment['comment_author'], $comment['comment_email']); ?>
                    </div>
                    <div class="uk-float-right">
                        <span data-uk-icon="icon: clock"></span> |
                        Written on <?php echo $comment['comment_createdAt']; ?>
                    </div>
                </div>
                </p>
            </header>
            <p>
                <?php echo $comment['comment_content']; ?>
            </p>
        </article>

        <?php
    }
} else {
    ?>
    <article class="uk-section uk-section-small uk-padding-remove-top">
        <header>
            <h5 class="uk-text-bold uk-margin-small-bottom">No comments found.</h5>
        </header>
    </article>
    <?php
}
?>
