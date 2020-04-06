(function($) {
    wp.customize.bind('ready', function() {
    });
    // Update the site title in real time...
    wp.customize('blogname', function(value) {
        value.bind(function(newval) {
            $('#site-title a').html(newval);
        });
    });

    // Update the site description in real time...
    wp.customize('blogdescription', function(value) {
        value.bind(function(newval) {
            $('.site-description').html(newval);
        });
    });

    //Update site title color in real time...
    wp.customize('header_textcolor', function(value) {
        value.bind(function(newval) {
            $('#site-title a').css('color', newval);
        });
    });

    //Update site background color...
    wp.customize('background_color', function(value) {
        value.bind(function(newval) {
            $('body').css('background-color', newval);
        });
    });

    //Update site link color in real time...
    wp.customize('link_textcolor', function(value) {
        value.bind(function(newval) {
            $('a').css('color', newval)
        });
    });
    for (var i = 1; i < 3; i++) {
        wp.customize('setting_section_head_' + i, function(value) {
            value.bind(function(newVal) {
                console.log(newVal)
                $('.text-hero .head-' + i).text(newVal)
            })
        })
    }
})(jQuery);