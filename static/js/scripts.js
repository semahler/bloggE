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

});