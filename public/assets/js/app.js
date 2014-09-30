$(function () {

    setup();

    // inject the required fields in the html on runtime
    function setup()
    {
        inject("genre");
        inject("product");
        inject("artist");
        inject("track");
    }

    // listen to duplicable buttons
    jQuery(document.body).on('click','.duplicable-btn',function(e)
    {
        var section = $(this).attr('section');
        // inject the selected section
        inject(section);

    });

    // listen to track duplicable buttons
    jQuery(document.body).on('click','.track-duplicable-btn',function(e)
    {
        var section = $(this).attr('section');
        // inject the selected section
        track_inject(section);

    });

    // the function injects a field
    function inject(section)
    {
        // get the template source from the server
        getTemplateSource(section, function(source)
        {
            // compile the template with Handlebars
            var template = Handlebars.compile(source);

            // count how many of this template already exist in the HTML
            var counter = $('.' + section).length;
            // the track_count is usefull for the track subsections
            var track_count = $('.track').length;

            // if section is 'track' then only the track_count is important else the absolute opposite
            var context = {count: counter, track_count: track_count};

            // build the final html
            var field = template(context);

            // append the field template to the html page
            $("."+section+"-group").append(field);

            // if is the track section, get (inject) its sub sections also
            if(section == 'track')
            {
                track_inject("track-genre");
  //            inject("track-product", null);
            }


        });
    }


    // the function injects a field
    function track_inject(section)
    {
        // count the tracks to figure out the group id
        var track_count = $('.track').length;

        // get the internal template source
        var source = $("#"+section+"-"+track_count).html();
        console.log($("#"+section+"-"+track_count));
        alert($("#"+section+"-"+track_count));
        // compile the template with Handlebars
        var template = Handlebars.compile(source);

        // count how many of this template already exist in the HTML
        var counter = $('.' + section).length;

        // if section is 'track' then only the track_count is important else the absolute opposite
        var context = {count: counter, track_count: track_count};

        // build the final html
        var field = template(context);

        // append the field template to the html page
        $("."+section+"-group").append(field);
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


