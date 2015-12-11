(function ($) {
    jQuery('html').themeshortcode({
            id: 'htmltag',
            title: 'Small & code',
            image: 'enter.png',
            showWindow: true,
            fields: [{type: 'select', name: 'Tag', id: 'tag', option: ['small', 'code', 'cite']}]
        },
        function (ed, url, options) {
            var tag = jQuery('#' + options.pluginprefix + 'tag').val();
            var selected_text = ed.selection.getContent();
            var html = '';
            html = '<' + tag + '>' + selected_text + '</' + tag + '>';
            ed.execCommand('mceInsertContent', false, html);
        });
})(jQuery);