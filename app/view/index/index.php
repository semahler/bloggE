<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div class="uk-grid" data-ukgrid>
            <div class="uk-width-2-3@m">

                <?php
                if (is_array($this->view_data['posts']) && sizeof($this->view_data['posts']) > 0) {
                    foreach ($this->view_data['posts'] as $key => $post) {
                ?>
                <article class="uk-section uk-section-small uk-padding-remove-top">
                    <header>
                        <h2 class="uk-text-bold uk-margin-small-bottom">
                            <a title="<?php echo $post['post_title']; ?>" class="uk-link-reset"
                               href="#"><?php echo $post['post_title']; ?></a>
                        </h2>
                        <p class="uk-article-meta">
                            <span data-uk-icon="icon: clock"></span> |
                            Written on <?php echo $post['post_createdAt']; ?>
                            <?php
                            if ($post['post_createdAt'] != $post['post_updatedAt']) {
                                echo "|" . $post['post_updatedAt'];
                            }
                            ?>
                    </header>
                    <p>
                        <?php echo $post['post_content']; ?>
                    </p>
                    <a href="#" title="Read More" class="uk-button uk-button-default uk-button-small">READ
                        MORE</a>
                    <hr>
                </article>
                <?php
                    }
                } else {
                ?>
                    <article class="uk-section uk-section-small uk-padding-remove-top">
                        <header>
                            <h2 class="uk-text-bold uk-margin-small-bottom">No saved posts found.</h2>
                            <h3> Create some new!</h3>
                        </header>
                    </article>
                <?php
                }
                ?>

            </div>
            <div class="uk-width-1-3@m">
                <h4 class="uk-heading-line uk-text-bold"><span>Latest Posts</span></h4>
                <ul class="uk-list">
                    <?php
                    //foreach ($latestPost as $lastestPosts) {
                    ?>
                        <li><a href="">Post</a></li>
                    <?php
                    //}
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>