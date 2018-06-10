$( document ).ready(function() {

    /**
     * Initalizing the Markdown Editot
     */
    const editTextArea = $("textarea[name='content']");

    if (editTextArea.length > 0) {
        const value = editTextArea.val();

        var simplemde = new SimpleMDE({
            element: editTextArea[0],
            forceSync: true,
            hideIcons: ["side-by-side", "fullscreen"],
            showIcons: ["code", "table"],
        });
        simplemde.value(value);
    }
    $("textarea[name='content']").attr('required', false); $('.CodeMirror textarea').attr('required', true);

    /**
     * Let the user confirm a delete action
     */
    $("a.save-delete").click(function(){
        if (!confirm("Do you want to delete")){
            return false;
        }
    });

    /**
     * initial loading of the comments when the page is called
     */
    var commentSection = $("div#comments_section");
    if (commentSection.length > 0) {
        var postIdentifier = commentSection.attr("data-id");

        reloadComments(postIdentifier);
    }

    /**
     * Collect comment-data and send it to the server
     */
    $('form#comment-form').submit(function(event) {

        event.preventDefault();

        var submitStatusArea = $("div#submit_status");
        var submitStatusText = $("div#submit_status > p");
        submitStatusArea.removeClass("uk-hidden");

        var formData = {
            'commentName'  	: $('input#name').val(),
            'commentMail' 	: $('input#mail').val(),
            'commentContent': $('textarea#comment').val(),
            'postCreatedAt' : $('input#createdAt').val()
        };

        $.ajax({
            type: "POST",
            dataType: "json",
            url: '/index/save-comment',
            data: formData,
            success: function(data) {
                if(data.success === true) {
                    submitStatusArea.addClass("uk-alert-success");
                    submitStatusText.text("Comment saved");
                }

                reloadComments(formData.postCreatedAt);
            },
            error: function(xhr, desc, err) {
                submitStatusArea.addClass("uk-alert-danger");
                submitStatusText.text("An error has occurred");
            }
        });

        resetFormInput();
    });

    /**
     * Clearing the input-fields after writing a comment
     */
    function resetFormInput() {
        $('input#name').val("");
        $('input#mail').val("");
        $('textarea#comment').val("");
    }

    /**
     * Loading the comments of a post via ajax-call
     *
     * @param postIdentifier
     */
    function reloadComments(postIdentifier) {
        var submitStatusArea = $("div#submit_status");
        var submitStatusText = $("div#submit_status > p");

        if (postIdentifier === undefined) {
            submitStatusArea.addClass("uk-alert-danger");
            submitStatusText.text("Error while loading the comments");

            return;
        }

        $.get('/index/get-comments/' + postIdentifier, function (data) {
            $("div#comments_section").html(data);
        });
    }
});