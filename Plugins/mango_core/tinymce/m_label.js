(function ($) {
    jQuery('html').themeshortcode({
            id: 'm_label',
            title: 'Label',
            image: 'illbutton.png',
            showWindow: true,
            fields: [{
                type: 'select',
                name: 'Label Formate',
                id: 'label',
                option: ['default', 'primary', 'success', 'info', 'warning', 'popular', 'new']
            }]
        },
        function (ed, url, options) {
            var label = jQuery('#' + options.pluginprefix + 'label').val();
            var selected_text = ed.selection.getContent();
            var html = '';
            html = '<span class="label label-' + label + '">' + selected_text + '</span>';
            ed.execCommand('mceInsertContent', false, html);
        });
})(jQuery);