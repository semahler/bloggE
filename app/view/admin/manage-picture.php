<div class="uk-section uk-section-default uk-section-small">
    <div class="uk-container uk-container-small">
        <div class="uk-grid" data-ukgrid>

            <div class="uk-width-1-1">
                <h1 class="uk-heading-line uk-text-center"><span>Upload or delete pictures</span></h1>

                <h4 class="uk-text-bold uk-margin-small-bottom uk-heading-line"><span>Upload a new picture</span></h4>
                <form action="/admin/save-picture/" method="POST" enctype="multipart/form-data">
                    <div class="uk-margin" uk-margin>
                        <div uk-form-custom="target: true">
                            <input type="file" name="fileToUpload" id="fileToUpload">

                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                        </div>
                        <input type="hidden" name="createdAt" value="123" />
                        <button type="submit" class="uk-button uk-button-primary">UPLOAD</button>
                    </div>
                </form>


                <h4 class="uk-text-bold uk-margin-small-bottom uk-heading-line"><span>Existing pictures</span></h4>

                <table class="uk-table uk-table-divider uk-table-middle uk-table-responsive">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Filename</th>
                        <th>Size</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if (is_array($this->view_data['pictures']) && sizeof($this->view_data['pictures']) > 0) {
                        foreach ($this->view_data['pictures'] as $key => $picture) {
                            ?>
                            <tr>
                                <td><img data-src="<?php echo $picture['path']; ?>" width="250px" height="auto" alt="<?php echo $picture['name']; ?>" uk-img></td>
                                <td><?php echo $picture['name']; ?></td>
                                <td><?php echo $picture['size']; ?></td>
                                <td>
                                    <div class="uk-button-group">
                                        <a class="uk-button uk-button-danger uk-button-small save-delete" href="/admin/delete-picture/?filename=<?php echo urlencode($picture['name']); ?>">DELETE</a>
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