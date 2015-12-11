$j = jQuery.noConflict();

window.ViewRevButton = vc.shortcode_view.extend({
    // Render method called after element is added( cloned ), and on first initialisation
    render: function () {
        //console && console.log('ViewRevButton: render method called.');
        window.ViewRevButton.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event
        return this;
    },
    ready: function (e) {
        //console && console.log('ViewRevButton: ready method called.');
        window.ViewRevButton.__super__.ready.call(this, e);
        return this;
    },

    //Called every time when params is changed/appended. Also on first initialisation
    changeShortcodeParams: function (model) {
        //console && console.log('ViewRevButton: changeShortcodeParams method called.');
        // console && console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
        window.ViewRevButton.__super__.changeShortcodeParams.call(this, model);
        //console.log(model);
        var id, btn_text, shadow, box, btn_size, btn_color, btn_wrap = '';
        id = model.id;
        btn_size = model.attributes.params.btn_size;
        btn_color = model.attributes.params.color;
        if (model.attributes.params.btn_text) {
            btn_text = model.attributes.params.btn_text;
        }
        if (model.attributes.params.shadow != 'yes') {
            shadow = 'btn-extra';
        } else {
            shadow = '';
        }

        if (model.attributes.params.box && btn_size == 'btn-large') {
            box = 'btn-shadow';
        } else {
            box = '';
        }

        btn_wrap = $j(".wpb_rev_button[data-model-id=" + id + "]").children('.wpb_element_wrapper');
        btn_wrap.find('span').not('.vc_element-icon').remove();
        btn_wrap.append('<span class="' + btn_size + ' ' + btn_color + ' ' + box + ' ' + shadow + '"><span>' + btn_text + '</span></span>');


    },
    changeShortcodeParent: function (model) {
        // console && console.log('ViewRevButton: changeShortcodeParent method called.');
        window.ViewRevButton.__super__.changeShortcodeParent.call(this, model);

    },
    deleteShortcode: function (e) {
        // console && console.log('ViewRevButton: deleteShortcode method called.');
        window.ViewRevButton.__super__.deleteShortcode.call(this, e);
    },

    editElement: function (e) {
        //console && console.log('ViewRevButton: editElement method called.');
        window.ViewRevButton.__super__.editElement.call(this, e);
    },

    clone: function (e) {
        // console && console.log('ViewRevButton: clone method called.');
        window.ViewRevButton.__super__.clone.call(this, e);
    }

});


window.ViewRevButton2 = vc.shortcode_view.extend({
    // Render method called after element is added( cloned ), and on first initialisation
    render: function () {
        //console && console.log('ViewRevButton2: render method called.');
        window.ViewRevButton2.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event
        return this;

    },

    ready: function (e) {
        //console && console.log('ViewRevButton: ready method called.');
        window.ViewRevButton2.__super__.ready.call(this, e);
        return this;
    },

    //Called every time when params is changed/appended. Also on first initialisation
    changeShortcodeParams: function (model) {
        //console && console.log('ViewRevButton: changeShortcodeParams method called.');
        // console && console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
        window.ViewRevButton2.__super__.changeShortcodeParams.call(this, model);
        //console.log(model);
        var id, btn_text_1, btn_text_2, btn_wrap, shadow = '';
        id = model.id;
        if (model.attributes.params.btn_text_1) {
            btn_text_1 = model.attributes.params.btn_text_1;
        }
        if (model.attributes.params.btn_text_2) {
            btn_text_2 = model.attributes.params.btn_text_2;
        }
        if (model.attributes.params.shadow != 'yes') {
            shadow = 'btn-extra';
        }
        btn_wrap = $j(".wpb_rev_button_2[data-model-id=" + id + "]").children('.wpb_element_wrapper');
        btn_wrap.find('div.btn-double').remove();
        btn_wrap.append('<div class="btn-double ' + shadow + '"><span class="btn-large btn-first">' + btn_text_1 + '</span><span class="btn-large btn-second">' + btn_text_2 + '</span></div>');
    },

    changeShortcodeParent: function (model) {
        // console && console.log('ViewRevButton: changeShortcodeParent method called.');
        window.ViewRevButton2.__super__.changeShortcodeParent.call(this, model);
    },
    deleteShortcode: function (e) {
        // console && console.log('ViewRevButton: deleteShortcode method called.');
        window.ViewRevButton2.__super__.deleteShortcode.call(this, e);
    },

    editElement: function (e) {
        //console && console.log('ViewRevButton: editElement method called.');
        window.ViewRevButton2.__super__.editElement.call(this, e);
    },

    clone: function (e) {
        // console && console.log('ViewRevButton: clone method called.');
        window.ViewRevButton2.__super__.clone.call(this, e);
    }

});