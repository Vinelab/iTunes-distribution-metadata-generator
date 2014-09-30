$(function () {

    setup();

    // inject the required fields in the html on runtime
    function setup()
    {
        inject("genre", null);
        inject("product", null);
        inject("artist", null);
        inject("track", null);
    }

    // listen to duplicable buttons
    jQuery(document.body).on('click','.duplicable-btn',function(e)
    {
        var section = $(this).attr('section');
        var num = $(this).attr('num');

        // inject the selected section
        inject(section, num);

    });

    // the function injects a field | the num param is important for the track subsections
    function inject(section, num)
    {
        // get the template source from the server
        getTemplateSource(section, function(source)
        {
            // compile the template with Handlebars
            var template = Handlebars.compile(source);

            // the track_count is usefull for the track subsections
            var track_count = $('.track').length;

            if(section == 'track-genre')
            {
                // count how many of this template already exist in the HTML
                var counter = $('.' + section + '-' + num).length;
            }else{
                // count how many of this template already exist in the HTML
                var counter = $('.' + section).length;
            }

            // if section is 'track' then only the track_count is important else the absolute opposite
            var context = {count: counter, track_count: track_count};

            // build the final html
            var field = template(context);

            if(section == 'track-genre')
            {
                // append the field template to the html page
                $("."+section+"-group-"+num).append(field);
            }else
            {
                // append the field template to the html page
                $("."+section+"-group").append(field);
            }
            // if is the track section, get (inject) its sub sections also
            if(section == 'track')
            {
                inject("track-genre", track_count);
            }
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


