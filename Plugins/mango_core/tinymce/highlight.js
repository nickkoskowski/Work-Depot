(function ($) {
    jQuery('html').themeshortcode({
            id: 'highlight',
            title: 'Highlight',
            image: 'highlight.png',
            showWindow: true,
            fields: [{
                type: 'select',
                name: 'color',
                id: 'color',
                option: ['none', 'reverse', 'first-color', 'second-color', 'third-color']
            }, {type: 'check', name: 'With Background', id: 'bg', checked: 'checked', value: 'yes'}]
        },
        function (ed, url, options) {
            var color = jQuery('#' + options.pluginprefix + 'color').val();
            var bg = jQuery('#' + options.pluginprefix + 'bg:checked').val();
            var selected_text = ed.selection.getContent();
            if (color == 'none')
                color = '';
            var html = '';
            if (bg == 'yes') {
                html = '<span class="highlight ' + color + '">' + selected_text + '</span>';
            } else {
                html = '<span class="' + color + '">' + selected_text + '</span>';
            }
            ed.execCommand('mceInsertContent', false, html);
        });
})(jQuery);