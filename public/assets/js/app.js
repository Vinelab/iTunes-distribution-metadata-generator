$(function () {

    setup();

    // inject the duplicated fields in the html on runtime
    function setup()
    {
        duplicate("genre");
    }

    // listener field duplication buttons
    $( ".duplicable-btn" ).on( "click", function() {
        duplicate($(this).prop('name'));
    });

    // the function duplicates a field
    function duplicate(section)
    {
        var source   = $("#"+section+"-template").html();
        var template = Handlebars.compile(source);
        var context  = {count: $('.' + section ).length}
        var html     = template(context);
        $("#"+section+"-group").append(html);
    }

});


