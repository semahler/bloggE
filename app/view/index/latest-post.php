<ul class="uk-list">
    <?php
    if (is_array($this->view_data['latestPosts']) && sizeof($this->view_data['latestPosts']) > 0) {
        foreach ($this->view_data['latestPosts'] as $key => $latestPost) {
            ?>
            <li>
                <span data-uk-icon="icon: clock"></span> | <?php echo $latestPost['post_createdAt']; ?><br />
                <a title="<?php echo $latestPost['post_title']; ?>" class="uk-link-reset"
                   href="<?php echo $latestPost['post_url']; ?>"><?php echo $latestPost['post_title']; ?>
                </a>
            </li>
            <?php
        }
    }
    ?>
</ul>