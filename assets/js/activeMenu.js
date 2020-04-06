(function( $ ) {
    $.fn.activeMenu = function(options) {
        var settings = $.extend({
            classActive: 'active',
            objActive: 'a',
            exceptSection: ""
        }, options );

        var navObject = this;
        var linkArray = navObject.find("a");
        var path      = window.location.pathname.replace('../../app_dev.php/index.html','').replace('../../app_dev.html','');
        var pathArray = path.charAt(0)=='/'? path.substring(1,path.length).split( '../../index.html' ):path.split( '../../index.html' );
        var objActive = null;


        function compare(strUrl) {

            linkArray.each(function(el) {

                var $this = $(this);
                var _urlArray = $this.attr("href").replace(domain+'/','').split( '../../index.html' ).toString();

                if(_urlArray.search(strUrl) >-1) {

                    objActive = $this ;

                    if($this.parent('li').has( "a" ).length == 0) {

                        return false;
                    }

                }


            });
        }
        //in case homepage not index.html
        if(pathArray.length == 1 ) {
            if(settings.objActive=='a') {
                navObject.find('li').eq(0).children('a').addClass(settings.classActive);
            }else {
                navObject.find('li').eq(0).addClass(settings.classActive);
            }
            return this;
        }

        if(pathArray.length > 0) {
            var sizePath = pathArray.length  ;
            var arrSection = settings.exceptSection.split( ',' );
            for (i = 0; i < sizePath; i++) {
                var tmp = pathArray.slice(0, sizePath - i).toString();

                if((i == sizePath-1) && arrSection.indexOf(tmp) > -1 ) {
                    break;
                }
                compare(tmp); //so sanh url voi href trong tag A

                if(objActive!=null) {
                    if(settings.objActive=='a') {
                        objActive.addClass(settings.classActive);
                        objActive.parents('li').children('a').addClass(settings.classActive);
                    }else {
                        objActive.parent('li').addClass(settings.classActive);
                        objActive.parents('li').addClass(settings.classActive);
                    }
                    objActive.parents('li').addClass('open')
                    break;
                }
            }
        }

        return this;
    };



}( jQuery ));

$(document).ready(function() {
    //active navigation
    if ($('#main-nav__list').length) {
            $("#main-nav__list").activeMenu({
                classActive: 'active', //default value is active
                objActive: 'li'
        });
    }

    var urlLink = window.location.href;

    var resultLink = urlLink.search('products');
    if (resultLink >= 0) {
        var cacheLink = window.location.href.split('#').pop();
        $( "#main-nav__list li.open ul li" ).each(function(e) {

            var urlNav = $(this).children('a').attr('href');
            if ( urlNav.search(cacheLink) != -1) {
                $('#main-nav__list li.open ul li').removeClass('active');
                $(this).addClass('active');
                return false;
            }

        });

    }
    $( "#main-nav__list li.open ul li a" ).on('click', function() {


        if (resultLink >= 0) {
            $('#main-nav__list li.nav-dad.open ul li').removeClass('active');
            $(this).parent().addClass('active');
        }
    });


});




