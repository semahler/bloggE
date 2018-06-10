<div id="submit_status" class="uk-hidden" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p></p>
</div>

<form id="comment-form" class="uk-form-stacked" method="POST">

    <div class="uk-margin">
        <label class="uk-form-label" for="name">Name</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="name" name="name" type="text" placeholder="Your name" required>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="name">Mail</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="mail" name="mail" type="text" placeholder="Your mail adress" required>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="content">Comment</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea" rows="5" id="comment" name="comment" placeholder="Your comment" required></textarea>
        </div>
    </div>

    <input type="hidden" id="createdAt" name="createdAt" value="<?php echo $this->view_data['post']['id']; ?>" />

    <hr />

    <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-primary">Save</button>
    </div>
</form>