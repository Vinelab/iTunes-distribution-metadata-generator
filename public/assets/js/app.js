$(function () {

    // array of the track sections names (duplicable subsections)
    var track_sections = ["track-genre", "track-product", "track-artist"];

    setup();

    /**
     * injects the duplicable fields in the html on runtime
     *
     */
    function setup()
    {
        inject("genre", null);
        inject("product", null);
        inject("artist", null);
        inject("track", null);
    }

    /**
     * listen to the duplicable buttons events
     */
    jQuery(document.body).on('click','.duplicable-btn',function(e)
    {
        var section = $(this).attr('section');
        var num = $(this).attr('num');

        // inject the selected section
        inject(section, num);
    });


    /**
     * the function injects a field (template)
     *
     * @param section is a field or a group of fields
     * @param num is used for the track subsections only to know which section to inject in
     */
    function inject(section, num)
    {
        // get the template source from the server
        getTemplateSource(section, function(source)
        {
            // compile the template with Handlebars
            var template = Handlebars.compile(source);

            // if is a subsection of the 'track' section
            if($.inArray(section, track_sections) > -1)
            {
                var counter = $('.' + section + '-' + num).length;
                var context = {count: counter, track_count: num};
                var field = template(context);
                $("."+section+"-group-"+num).append(field);
            }
            else
            {
                var counter = $('.' + section).length;
                var track_count = $('.track').length;
                var context = {count: counter, track_count: track_count};
                var field = template(context);
                $("."+section+"-group").append(field);
            }


            // if is the track section, get (inject) its sub sections also
            if(section == 'track')
            {
                inject("track-genre", track_count);
                inject("track-product", track_count);
                inject("track-artist", track_count);
            }

        });
    }


    /**
     * load the template source from the server
     *
     * @param section
     * @param callback
     */
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


