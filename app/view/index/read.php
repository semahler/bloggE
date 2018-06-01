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
                <h2 class="uk-heading-line uk-text-bold"><span>Latest Posts</span></h2>
                <ul class="uk-list">
                    <?php
                    foreach ($post as $lastestPosts) {
                        ?>
                        <li><a href="">Post</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="uk-section uk-padding-remove-vertical">
    <div class="uk-container">
        <div class="uk-grid" data-ukgrid>
            <div class="uk-width-1-1">
               <h2 class="uk-text-bold uk-margin-small-bottom uk-heading-line"><span>Comments</span></h2>

                <?php
                if (is_array($this->view_data['comments']) && sizeof($this->view_data['comments']) > 0) {
                    foreach ($this->view_data['comments'] as $key => $comment) {
                ?>
                <article class="uk-section uk-section-small uk-padding-remove-top">
                    <header>
                        <p class="uk-article-meta">
                            <span data-uk-icon="icon: clock"></span> |
                            Written on <?php echo $comment['commment_created_at']; ?>
                            <span data-uk-icon="icon: user"></span> |
                            <?php echo $comment['comment_author']; ?>
                            <?php echo $comment['comment_email']; ?>
                        </p>
                    </header>
                    <p>
                        <?php echo $comment['comment_content']; ?>
                    </p>
                </article>
                <hr>
                <?php
                    }
                } else {
                ?>
                    <article class="uk-section uk-section-small uk-padding-remove-top">
                        <header>
                            <h2 class="uk-text-bold uk-margin-small-bottom">No comments found.</h2>
                            <h3> Create one!</h3>
                        </header>
                    </article>
                    <?php
                }
                ?>

                <hr />

                <form class="uk-form-stacked" action="/index/save-comment/" method="POST">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="name">Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="name" name="name" type="text" placeholder="Your name">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="name">Mail</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="mail" name="mail" type="text" placeholder="Your mail adress">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="content">Comment</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-textarea" rows="5" id="comment" name="comment" placeholder="Your comment"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="createdAt" value="<?php echo $this->view_data['post_created_at']; ?>" />

                    <hr />

                    <div class="uk-margin">
                        <button type="submit" class="uk-button uk-button-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>