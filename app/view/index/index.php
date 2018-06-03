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
                        <h2 class="uk-text-bold uk-margin-small-bottom uk-heading-line">
                            <span>
                                <a title="<?php echo $post['post_title']; ?>" class="uk-link-reset"
                                   href="<?php echo $post['post_url']; ?>"><?php echo $post['post_title']; ?></a>
                            </span>
                        </h2>
                        <div class="uk-article-meta">
                            <div class="uk-clearfix">
                                <div class="uk-float-left">
                                    <span data-uk-icon="icon: clock"></span> |
                                    Written on <?php echo $post['post_createdAt']; ?>
                                    <?php
                                    if ($post['post_createdAt'] != $post['post_updatedAt']) {
                                        echo "|" . $post['post_updatedAt'];
                                    }
                                    ?>
                                </div>
                                <div class="uk-float-right">
                                    <span data-uk-icon="icon: comment"></span> |
                                    <?php echo $post['post_comment_count']; ?> comment(s)
                                </div>
                            </div>
                        </div>
                    </header>
                    <p>
                        <?php echo $post['post_content']; ?>
                    </p>
                    <a href="<?php echo $post['post_url']; ?>" title="Read More" class="uk-button uk-button-default uk-button-small">READ
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
                    if (is_array($this->view_data['latestPosts']) && sizeof($this->view_data['latestPosts']) > 0) {
                        foreach ($this->view_data['latestPosts'] as $key => $latestPost) {
                    ?>
                        <li>
                            <a title="<?php echo $latestPost['post_title']; ?>" class="uk-link-reset"
                               href="<?php echo $latestPost['post_url']; ?>"><?php echo $latestPost['post_title']; ?></a>
                        </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>

        <?php

        include_once 'pagination.php'

        ?>
    </div>
</div>
