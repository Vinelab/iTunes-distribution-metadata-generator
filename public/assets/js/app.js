$(function () {

    var type = null;
    // array of the track sections names (duplicable subsections)
    var track_sections = ["track-genre", "track-product", "track-artist"];
    var remove_btn_template = null;

    // initialize the app
    setup();


    /**
     * injects the duplicable fields in the html on runtime
     */
    function setup()
    {
        setAppType();

        // get the remove button template first
        getTemplateSource("remove-btn", function(source)
        {
            // get the remove button template ready
            remove_btn_template = Handlebars.compile(source);

            if(type == 'album')
            {
                inject("genre", null);
                inject("product", null);
                inject("artist", null);
                inject("track", null);
            }else if(type == 'track')
            {
                inject("track", null);
            }

        });
    }


    /**
     * set the app type [album] or [track]
     * by getting the type form the url
     */
    function setAppType()
    {
        var url = document.URL;
        // get the last segment of the url
        type = url.split('/').pop();
    }


    /**
     * listen to the duplicable buttons events
     */
    jQuery(document.body).on('click','.duplicable-btn',function(e)
    {
        e.preventDefault();

        var section = $(this).attr('section');
        var num = $(this).attr('num');

        // inject the selected section
        inject(section, num);
    });


    /**
     * listen to the remove field buttons events
     */
    jQuery(document.body).on('click','.rm-btn-circle',function(e)
    {
        e.preventDefault();
        $(this).closest('.form-group').remove();
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

            // if is a subsection of the 'track' section
            if($.inArray(section, track_sections) > -1)
            {
                var count = $('.' + section + '-' + num).length;
                var track_count = num;
                var element = "."+section+"-group-"+num;
            }
            else
            {
                var count = $('.' + section).length;
                var track_count = $('.track').length;
                var element = "."+section+"-group"
            }

            // start adding the remove button after the first duplicate
            var remove_btn = count > 0 ? remove_btn_template : null

            var template = Handlebars.compile(source);
            var context = {
                            count: count,
                            track_count: track_count,
                            remove_btn: remove_btn
                          };
            var field = template(context);
            $(element).append(field);


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
        // if type is track load the single track templates, except for the remove button
        if(type == 'track' && section != 'remove-btn')
            url = 'assets/templates/single-track-templates/' + section + '.template';
        else
            url = 'assets/templates/' + section + '.template';


        $.ajax({
            type: "GET",
            url: url
        }).done(function(data)
        {
            // call back the caller function with the received data
            callback(data);
        });
    }


});


