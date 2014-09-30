$(function () {

    setup();

    // inject the duplicated fields in the html on runtime
    function setup()
    {
        duplicate("genre", null);
        duplicate("product", null);
        duplicate("artist", null);
        duplicate("track", null);
        duplicate("track-genre", null);
//        duplicate("track-product", null);
    }

    // listener field duplication buttons
    jQuery(document.body).on('click','.duplicable-btn',function(e)
    {
        var section = $(this).attr('section');

        duplicate(section, $(this));

        // if is the track section, duplicate the track sub sections also
        if(section == 'track')
        {
            duplicate("track-genre", null);
//            duplicate("track-product", null);
        }

    });

    // the function duplicates a field
    function duplicate(section, element)
    {
        // get the template source from the server
        getTemplateSource(section, function(source){

            // compile the template with Handlebars
            var template = Handlebars.compile(source);
            // count how many of this template already exist in the HTML
            var counter = $('.' + section).length;
            // pass that number to the template variable (count)
            var context = {count: counter}
            // build the final html
            var field = template(context);

            // append the field template to the html page
            if(element != null)
                $(element).closest("."+section+"-group").append(field);
            else
                $("."+section+"-group").append(field);

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


