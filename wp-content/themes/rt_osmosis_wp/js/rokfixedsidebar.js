((function($){

    var FixedSidebar = {
        init: function(){
            FixedSidebar.panel = $('rt-sidepanel-content');
            FixedSidebar.check();
        },
        check: function(){
            if (!FixedSidebar.panel) return;
            var shouldBeFixed = FixedSidebar.panel.getTop() < window.getScrollTop(),
                panelWidth    = FixedSidebar.panel.getSize().x;

            FixedSidebar.panel[shouldBeFixed ? 'addClass' : 'removeClass']('rt-sidepanel-fixed');
            setTimeout(function(){
                FixedSidebar.panel[shouldBeFixed ? 'addClass' : 'removeClass']('rt-sidepanel-animated');
            }, 10);

            var wrappers = document.getElements('.rt-sidepanel-wrapper, .rt-sidepanel-bottom');
            if (wrappers.length){
                wrappers.setStyle('width', panelWidth);
            }
        }
    };

    window.addEvents({
        domready: FixedSidebar.init,
        resize:   FixedSidebar.check,
        scroll:   FixedSidebar.check
    });

})(document.id));
