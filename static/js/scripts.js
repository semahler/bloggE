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
                    console.log(data.success);
                    submitStatusArea.addClass("uk-alert-success");
                    submitStatusText.text("Comment saved");
                }
            },
            error: function(xhr, desc, err) {
                submitStatusArea.addClass("uk-alert-danger");
                submitStatusText.text("An error has occurred");
            }
        });

        resetFormInput();
    });

    function resetFormInput() {
        $('input#name').val("");
        $('input#mail').val("");
        $('textarea#comment').val("");
    }

    /*
    function reloadComments(postIdentifier) {
        if (postIdentifier === undefined) {
            Console.log('Error');
            return;
        }

        $.ajax({
            type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url 		: '/index/get-comment', // the url where we want to POST
            
            dataType 	: 'json', // what type of data do we expect back from the server
            encode 		: true
        })
        // using the done promise callback
            .done(function(data) {
                console.log(data);

                if ( ! data.success) {



                } else {

                    $('form').append('<div class="alert alert-success">' + data.message + '</div>');

                }
            })
            .fail(function(data) {

                // show any errors
                // best to remove for production
                console.log(data);
            });
    }
    */
});