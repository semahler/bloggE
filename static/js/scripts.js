$( document ).ready(function() {

    const content = $("textarea[name='content']")[0];
    if (content !== undefined) {
        var simplemde = new SimpleMDE({ element: content });
    }

    const textarea = $(".CodeMirror textarea");
    if (textarea !== undefined) {
        textarea.attr("required", true);
    }

});