(function ($) {
    jQuery('html').themeshortcode({
            id: 'alertlink',
            title: 'Alert Link',
            image: 'pricinggrid.png',
            showWindow: true,
            fields: [{type: 'text', name: 'Link Text', id: 'linktxt'}, {type: 'text', name: 'Url', id: 'url'}]
        },
        function (ed, url, options) {
            var txt = jQuery('#' + options.pluginprefix + 'linktxt').val();
            var url = jQuery('#' + options.pluginprefix + 'url').val();
            var html = '';
            html = '<a href="' + url + '" class="alert-link">' + txt + '</a>';
            ed.execCommand('mceInsertContent', false, html);
        });
})(jQuery);