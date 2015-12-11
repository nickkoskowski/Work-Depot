(function ($) {
    jQuery('html').themeshortcode({
            id: 'zoomcharactor',
            title: 'Dropcap Character',
            image: 'dropcap.png',
            showWindow: true,
            fields: [{
                type: 'select',
                name: 'color',
                id: 'color',
                option: ['none', 'first-color', 'second-color', 'third-color']
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
                html = '<span class="dropcap-bg ' + color + '">' + selected_text + '</span>';
            } else {
                html = '<span class="dropcap ' + color + '">' + selected_text + '</span>';
            }
            ed.execCommand('mceInsertContent', false, html);
        });
})(jQuery);