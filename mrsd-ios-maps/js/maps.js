jQuery(document).ready(function() {

    jQuery.each(jQuery('.mapLink'), function(i, element) {
        element = jQuery(element);

        if( (navigator.userAgent.indexOf("iPhone") != -1)
            || (navigator.userAgent.indexOf("iPod") != -1)
            || (navigator.userAgent.indexOf("iPad") != -1))
            element.attr('href', element.attr('href')
                                    .replace('https', 'maps')
                                    .replace('google', 'apple'));
    });

});
