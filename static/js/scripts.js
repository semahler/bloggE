$( document ).ready(function() {

    const editTextArea = $("textarea[name='content']");

    if (editTextArea.length > 0) {
        const value = editTextArea.val();

        var simplemde = new SimpleMDE({ element: editTextArea[0] });
        simplemde.value(value);
    }

    $("a.save-delete").click(function(){
        if (!confirm("Do you want to delete")){
            return false;
        }
    });

});