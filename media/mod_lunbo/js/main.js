jQuery(function() {
        var bannerSlider = new Slider(jQuery('#banner_tabs'), {
                time: 5000,
                delay: 400,
                event: 'hover',
                auto: true,
                mode: 'fade',
                controller: jQuery('#bannerCtrl'),
                activeControllerCls: 'active'
        });
        jQuery('#banner_tabs .flex-prev').click(function() {
                bannerSlider.prev()
        });
        jQuery('#banner_tabs .flex-next').click(function() {
                bannerSlider.next()
        });
})