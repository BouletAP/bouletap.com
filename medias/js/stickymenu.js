var APBStickyMenu = {

    toggleStickyMenuHolder : false, 
    
	init: function() {
		if( !this.toggleStickyMenuHolder ) {
            var self = this;
            self.toggleStickyMenuHolder = true;
            setTimeout(function() {
                var scroll = window.scrollY;
                var sectionHeader = document.getElementById('main-header');
                if( scroll > 0 ) {
                    sectionHeader.classList.add('menu-sticky');
                }
                else {
                    sectionHeader.classList.remove('menu-sticky');
                }
                self.toggleStickyMenuHolder = false;
            }, 100);
        }
    }
};