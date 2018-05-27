<form class="uk-form-stacked" action="/admin/save-post/" method="POST">

    <div class="uk-margin">
        <label class="uk-form-label" for="title">Title</label>
        <div class="uk-form-controls">
            <input class="uk-input" name="title" type="text" value="<?php echo $this->view_data['post_title']; ?>" placeholder="Title of the post">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="content">Content</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea" rows="15" name="content" value="<?php echo $this->view_data['post_content']; ?>" placeholder="Content of the post"></textarea>
        </div>
    </div>

    <input type="hidden" name="createdAt" value="<?php echo $this->view_data['post_created_at']; ?>" />

    <hr />

    <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-primary">Save</button>
    </div>

</form>