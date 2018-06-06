
    </main>

    <footer class="uk-section uk-section-small uk-section-muted">
        <div class="uk-container">
            <p class="uk-text-medium uk-text-center"><b>Copyright 2018</b></p>
            <p class="uk-text-small uk-text-center">Created by Thomas Schulze | René Wienhold | Sebastian Mahler</p>
        </div>
    </footer>

    <div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
            <button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="<?php echo APPLICATION_ROOT_DIR; ?>">Home</a></li>
                <li class="uk-nav-divider"></li>
                <li class=""><a href="<?php echo NAV_PATH_ADMIN_NEW_POST; ?>">New Post</a></li>
                <li class=""><a href="<?php echo NAV_PATH_ADMIN_SELECT_POST; ?>">Edit Post</a></li>
                <li class=""><a href="<?php echo NAV_PATH_ADMIN_MANAGE_PICTURE; ?>">Upload Pictures</a></li>
            </ul>
        </div>
    </div>

</body>
</html>