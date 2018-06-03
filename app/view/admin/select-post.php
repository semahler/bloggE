<div class="uk-section uk-section-default uk-section-small">
    <div class="uk-container uk-container-small">
        <div class="uk-grid" data-ukgrid>

            <div class="uk-width-1-1">
                <h1 class="uk-heading-line uk-text-center"><span>Select a post to edit or delete</span></h1>

                <table class="uk-table uk-table-divider uk-table-middle uk-table-responsive">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if (is_array($this->view_data['posts']) && sizeof($this->view_data['posts']) > 0) {
                        foreach ($this->view_data['posts'] as $key => $post) {
                            ?>
                            <tr>
                                <td><?php echo $post['post_title']; ?></td>
                                <td><?php echo $post['post_createdAt']; ?></td>
                                <td>
                                    <div class="uk-button-group">
                                        <a class="uk-button uk-button-default uk-button-small" href="/admin/edit-post/<?php echo $post['id']; ?>">EDIT</a>
                                        <a class="uk-button uk-button-danger uk-button-small" href="/admin/delete-post/<?php echo $post['id']; ?>">DELETE</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>