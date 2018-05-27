$( document ).ready(function() {

    var content = $("textarea[name='content']")[0];

    if (content !== undefined) {
        var simplemde = new SimpleMDE({ element: content });
    }

});