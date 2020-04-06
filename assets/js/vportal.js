var MsVportal = {};

//handle hash changes

var loadingHTML = '<p class="posts__loading"><span>Loading...</span></p>';

jQuery(document).ready(function(e) {

    (function($) {

        var cate = $.urlParam('post'); // name
        // console.log(cate);

        if (cate != null && cate.length > 0) {
            MsVportal.loadNews(1, 'loadTab', cate);
        }

        var shortUri = $('#shortUri').val();
        var itemTotal = $('#itemTotal').val();

        if (itemTotal > 0) {
            if ($('#pagination-container').length > 0) {
                MsVportal.pagination();
            }
        }
        if (itemTotal > 0) {
            if ($('#bt-loadmore').length > 0) {
                MsVportal.loadmoreNews();
            }
        }
        

        $('#posts__tabs li a').click(function(event) {
            $('#posts__tabs li a').removeClass('active');
            $(this).addClass('active');
            MsVportal.loadNews(1, 'loadTab', $(this).data('cate'));
            return false;
        });


        $('#gallary-tabs li a').click(function() {

            var currentTab = "";

            currentTab = $(this).data('category');

            shortUrl = $(this).data('shorturl') + '/' + $(this).data('block-name');
            shortUrl += currentTab.length > 0 ? '.1.html?cate=' + currentTab : '.1.html';


            jQuery("ul#gallary-tabs > li ").removeClass("active");
            $(this).parent().addClass("active");

            MsVportal.loadGallary(currentTab, shortUrl);
            $("#cate-g").val(currentTab); 
            $("#list__image-more").attr('data-page', '1');
            return false;

        });


    })(jQuery);

});


MsVportal = (function($) {

    return {

        pagination: function() {

            var itemTotal = $('#itemTotal').val();
            var itemPerPage = $('#itemPerPage').val();

            var modulusPage = itemTotal % itemPerPage > 0 ? 1 : 0;

            var totalPages = parseInt(itemTotal / itemPerPage) + modulusPage;

            var searchPage = 1;

            if ($('#resultSearch').val() == 1) {
                searchPage = parseInt($('#searchPage').val()) + 1;
            }

            if (totalPages > 1) {

                $('#pagination').twbsPagination({
                    startPage: searchPage,
                    totalPages: totalPages,
                    visiblePages: 4,
                    first: '&laquo;',
                    prev: '&lsaquo;',
                    next: '&rsaquo;',
                    last: '&raquo;',
                    onPageClick: function(event, page) {
                        var currentSection = $('#currentSection').val();
                        MsVportal.loadNews(page, 'paging', currentSection);
                    }
                });

            } else {

                $('#pagination').empty();
                $('#pagination').removeData("twbs-pagination");
                $('#pagination').unbind("page");

            }

        },

        loadmoreNews: function() {

            var itemTotal = $('#itemTotal').val();
            var itemPerPage = $('#itemPerPage').val();
            

            var modulusPage = itemTotal % itemPerPage > 0 ? 1 : 0;

            var totalPages = parseInt(itemTotal / itemPerPage) + modulusPage;

            var loadmoreAjax;
            if (totalPages > 1) {
                // enable load more
                $('#posts__contain').on('click', '#bt-loadmore', function(){
                    var curPage = $('#page').val();
                    if (curPage < totalPages) {
                        //load more 
                        var nextPage = parseInt(curPage) + 1;
                        var shortUri = $('#loadmoreUri').val();
                        var container = $('#posts__contain');
                        var loading = container.prev('.posts__loading');
                        var cate = $('#cateCode').val();
                        cate = (cate == 'danh-sach' || cate == 'list') ? '':cate; 
                        var urlRequest = cate.length > 0 ? shortUri + '.' + nextPage + '.html?cate=' + cate : shortUri + '.' + nextPage + '.html';
                        if (loadmoreAjax != undefined) {
                            loadmoreAjax.abort();
                            loadmoreAjax = undefined;
                        } else {
                            loadmoreAjax = $.ajax({
                                url: urlRequest,
                                dataType: 'json',
                                beforeSend: function() {

                                    if (loading.length == 0) {
                                        loading = $(loadingHTML);
                                        container.before(loading);
                                    } else {
                                        loading.removeClass('posts__loading--hidden')
                                    }

                                },
                                success: function(result) {
                                    $('#bt-loadmore').parent().before(result);
                                    loading.addClass('posts__loading--hidden');
                                    if (nextPage < totalPages) {
                                        $('#page').val(nextPage);
                                    } else {
                                        $('#bt-loadmore').parent().remove();
                                    }
                                    loadmoreAjax = undefined;
                                }
                            });
                        }
                    }
                    return false;
                });
            } else {
                $('#bt-loadmore').parent().remove();
            }

        },

        loadNews: function(page, type, currentSection) {

            var shortUri = $('#shortUri').val();
            var container = $('#posts__contain');
            var loading = container.prev('.posts__loading');
            var urlRequest = currentSection.length > 0 ? shortUri + '.' + page + '.html?cate=' + currentSection : shortUri + '.' + page + '.html';

            $.ajax({
                url: urlRequest,
                dataType: 'json',
                beforeSend: function() {

                    if (loading.length == 0) {
                        loading = $(loadingHTML);
                        container.before(loading);
                    } else {
                        loading.removeClass('posts__loading--hidden')
                    }

                },
                success: function(result) {
                    container.html(result);
                    loading.addClass('posts__loading--hidden');

                    if (type == 'loadTab') {

                        $('#pagination').empty();
                        $('#pagination').removeData("twbs-pagination");
                        $('#pagination').unbind("page");

                        if ($('#itemTotal').val() > 0) {
                            MsVportal.pagination();
                        }
                        $('#currentSection').val(currentSection);
                        if ($('.main-title').hasClass('titleNews')) {
                            history.pushState(null, null, domain + "/news/list.1.html?post=" + currentSection);


                            $('#posts__tabs li').removeClass('active');
                            $('#posts__tabs li a[data-cate = "' + currentSection + '"]').closest('li').addClass('active');

                        }
                        if ($('.main-title').hasClass('titleActi')) {
                            history.pushState(null, null, domain + "/activities/list.1.html?post=" + currentSection);


                            $('#posts__tabs li').removeClass('active');
                            $('#posts__tabs li a[data-cate = "' + currentSection + '"]').closest('li').addClass('active');

                        }
                    }
                }
            });
        },



        loadGallary: function(cate, shortUrl) {
            $.ajax({
                url: shortUrl,
                dataType: 'html',
                success: function(result) {
                    if (result.length > 0) {
                        $('#list__image').html(result);
                        $('#list__image li:first-child').addClass('img-big');
                        DnDMoM.initLazyLoadGallery("#list__image", ".list__image-more");

                    } else {
                        $('#list__image').html("Updating...");
                    }
                }
            });
        }


    }

})(jQuery);


// ORIGINAL
$.urlParam = function(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
        return null;
    } else {
        return results[1] || 0;
    }
}




// EDIT
// $.urlParam = function(name) {
//     var path = window.location.href;
//     var param, results, result;
//     try {
//         param = path.split("?" + name + '=');
//         results = param[1].split("&");
//         if(results.length > 2) {
//             return result = results[0] + '&' + results[1];
//             // console.log(result);
//         }else {
//             // console.log(results);
//             return param[1];
//         }
//     }catch(e) {
//         // console.log('khong co param');
//         return null;
//     }
// }