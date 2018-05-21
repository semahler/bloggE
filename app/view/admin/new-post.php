<div class="uk-section uk-section-default uk-section-small">
    <div class="uk-container uk-container-small">
        <div class="uk-grid" data-ukgrid>

            <div class="uk-width-1-1">
                <h1 class="uk-heading-line uk-text-center"><span>New Post</span></h1>

                <form class="uk-form-stacked" action="admin/save/" method="POST">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="title">Title</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="title" name="title" type="text" placeholder="Title of the post">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="content">Content</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-textarea" rows="15" id="content" name="content" placeholder="Content of the post"></textarea>
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