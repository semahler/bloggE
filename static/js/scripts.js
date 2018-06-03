$( document ).ready(function() {

    const editTextArea = $("textarea[name='content']");
    const value = editTextArea.val();

    if (editTextArea !== undefined) {
        var simplemde = new SimpleMDE({ element: editTextArea[0] });
        simplemde.value(value);
    }
});