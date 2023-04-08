function filterBy($element) {
    var getCategory = $element.value,
        data = {
            'action': 'main_sort',
            'category': getCategory,
            'query': myajax.posts,
        };

    if (getCategory === "") {
        return;
    }

    jQuery.ajax({
        url: myajax.url,
        data: data,
        type: 'POST',
        beforeSend: function (xhr) { },
        success: function (data) {
            jQuery('.result').html(data);
            jQuery('.pagination').hide();
        }
    });
}

function loadMore($button) {
    var getCategory = jQuery('.select_category select').val(),
        maxPage = jQuery($button).data('max-page'),
        getPage = jQuery($button).attr("data-page"),
        button = jQuery($button),
        data = {
            'action': 'loadmore',
            'page': getPage,
            'category': getCategory,
        };

    jQuery.ajax({
        url: myajax.url,
        data: data,
        type: 'POST',
        beforeSend: function (xhr) {
            button.text('Loading...');
        },
        success: function (data) {
            if (data) {
                button.text('More posts').prev().after(data);
                getPage++;
                button.attr('data-page', getPage);

                if (getPage === maxPage) {
                    button.remove();
                }
            } else {
                button.remove();
            }
        }
    });
}



jQuery(document).ready(function (jQuery) {
    jQuery('.open-position__select').click(function () {
        filterBy(this);
    });

    jQuery(document).on("click", ".loadmore", function () {
        loadMore(this);
    });
});