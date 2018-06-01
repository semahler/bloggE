<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div class="uk-grid" data-ukgrid>
            <div class="uk-width-2-3@m">
                <article class="uk-section uk-section-small uk-padding-remove-top">
                    <header>
                        <h2 class="uk-text-bold uk-margin-small-bottom"><?php echo $post['post_url']; ?></h2>
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
                <h2 class="uk-margin-remove-adjacent uk-text-bold uk-margin-small-bottom"><a title="Fusce facilisis tempus magna ac dignissim." class="uk-link-reset" href="#">New Comment</a></h2>

                <form class="uk-form-stacked" action="admin/save/" method="POST">

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

                    <hr />

                    <div class="uk-margin">
                        <button type="submit" class="uk-button uk-button-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>