<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div class="uk-grid" data-ukgrid>
            <div class="uk-width-2-3@m">
                <article class="uk-section uk-section-small uk-padding-remove-top">
                    <header>
                        <h1 class="uk-margin-remove-adjacent uk-text-bold uk-margin-small-bottom"><a title="Fusce facilisis tempus magna ac dignissim." class="uk-link-reset" href="#">Fusce facilisis tempus magna ac dignissim.</a></h1>
                        <p class="uk-article-meta">Written on March 23, 2018. Posted in <a href="#">Blog</a> | <span data-uk-icon="icon: future"></span> Takes 7 min reading.</p>
                    </header>
                    <figure>
                        <img src="https://picsum.photos/800/300/?random=3" alt="Alt text">
                        <figcaption class="uk-padding-small uk-text-center uk-text-muted">Caption of the image</figcaption>
                    </figure>
                    <p>UPDATE 24th October 15.10 BST — Vivamus sed consequat urna. Fusce vitae urna sed ante placerat iaculis. Suspendisse potenti. Pellentesque quis fringilla libero. In hac habitasse platea dictumst.</p>
                    <p>Ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

                    <hr>
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