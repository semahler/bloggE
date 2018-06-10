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

                <div id="comments_section"></div>

            </div>
        </div>
    </div>
</div>