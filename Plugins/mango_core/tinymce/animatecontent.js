(function ($) {
    jQuery('html').themeshortcode({
            id: 'animatecontent',
            title: 'Content Animation Effect',
            image: 'star.png',
            showWindow: true,
            fields: [{
                type: 'select',
                name: 'Select Effect',
                id: 'select-effect',
                option: ['slideInDown', 'slideInUp', 'bounce', 'flash', 'fadeInDown', 'fadeInUp', 'fadeInRight', 'fadeInLeft', 'pulse', 'rubberBand', 'shake', 'rotateInDownRight', 'swing', 'tada', 'wobble', 'rotateInDownLeft']
            }]
        },
        function (ed, url, options) {
            var eff = jQuery('#' + options.pluginprefix + 'select-effect').val();
            var selected_text = ed.selection.getContent();
            var html = '';
            html = '<p class="animated ' + eff + '">' + selected_text + '</p>';
            ed.execCommand('mceInsertContent', false, html);
        });
})(jQuery);