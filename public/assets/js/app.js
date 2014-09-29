$(function () {

    setup();

    // inject the duplicated fields in the html on runtime
    function setup()
    {
        duplicate("genre");
        duplicate("product");
        duplicate("artist");
    }

    // listener field duplication buttons
    $( ".duplicable-btn" ).on("click", function() {
        duplicate($(this).attr('id'));
    });

    // the function duplicates a field
    function duplicate(section)
    {
        // get the template source from the server
        getTemplateSource(section, function(source){

            // compile the template with Handlebars
            var template = Handlebars.compile(source);
            // count how many of this template already exist in the HTML
            // and pass that number to the template variable (count)
            var context = {count: $('.' + section).length}
            // build the final html
            var field = template(context);
            // append the field template to the html page
            $("#"+section+"-group").append(field);
        });

    }

    // load the template source from the server
    function getTemplateSource(section, callback)
    {
        $.ajax({
            type: "GET",
            url: 'assets/templates/' + section + '.template'
        }).done(function(data)
        {
            // call back the caller function with the received data
            callback(data);
        });
    }


});


