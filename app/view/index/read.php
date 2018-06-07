<div class="uk-section uk-section-default uk-padding-remove-bottom">
    <div class="uk-container">
        <div class="uk-grid" data-ukgrid>
            <div class="uk-width-2-3@m">
                <article class="uk-section uk-section-small uk-padding-remove-top">
                    <header>
                        <h2 class="uk-text-bold uk-margin-small-bottom uk-heading-line"><span><?php echo $this->view_data['post']['post_title']; ?></span></h2>
                        <p class="uk-article-meta">
                            <span data-uk-icon="icon: clock"></span> |
                            Written on <?php echo $this->view_data['post']['post_createdAt']; ?>
                            <?php
                            if ($this->view_data['post']['post_createdAt'] != $this->view_data['post']['post_updatedAt']) {
                                echo "|" . $this->view_data['post']['post_updatedAt'];
                            }
                            ?>
                    </header>
                    <p>
                        <?php echo $this->view_data['post']['post_content']; ?>
                    </p>
                </article>
            </div>

            <div class="uk-width-1-3@m">
                <h4 class="uk-heading-line uk-text-bold"><span>Latest Posts</span></h4>

                <?php include_once 'latest-post.php'; ?>

            </div>

        </div>
    </div>
</div>

<div class="uk-section uk-padding-remove-vertical">
    <div class="uk-container">
        <div class="uk-grid" data-ukgrid>
            <div class="uk-width-2-3@m">
                <h4 class="uk-text-bold uk-margin-small-bottom uk-heading-line"><span>New Comment</span></h4>

                <?php include_once 'comment-form.php'; ?>

                <hr />

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

            </div>
        </div>
    </div>
</div>