
var APBPortfolio = {

    items: [],
    elementModalProject: false,
    elementModalProjectBg: false,

    init: function() {
		var self = this;
		this.fetch_data(function(data) {
			
            self.items = data;
            //console.log(data);
			
			self.initEvents();
		});
    },

    initEvents: function() {
		var self = this;
        
        jQuery('.elementor-element-61d95aa .elementor-portfolio article a').on('click', function(e) {   
            
            e.preventDefault();
            var project_id = "277";

            var classes = jQuery(this).parent()[0].classList;
            for(var i=0; i<classes.length; i++) {
                if( classes[i].substring(0,5) == 'post-' ) {
                    project_id = classes[i].substring(5)
                }
            }

            self.createModal();
            self.setupModalForProject(project_id);
            self.activateModal();

        });
    },

    killModal: function() {
        this.elementModalProject.remove(); 
        this.elementModalProjectBg.remove(); 
        jQuery('.elementor-section-wrap').removeClass('active-modal');
    },

    createModal: function() {        
		var self = this;
		var modalProjectBg = document.createElement("div");
        modalProjectBg.classList.add('donald-modal-bg');

        var modalProject = document.createElement("div");
        modalProject.classList.add('donald-modal');

        
        jQuery('body').prepend(modalProjectBg);
        this.elementModalProjectBg = jQuery(modalProjectBg);

        jQuery('body').prepend(modalProject);        
        this.elementModalProject = jQuery(modalProject);
        

        this.elementModalProjectBg.on('click', function(e) {
            self.killModal();
        });
        this.elementModalProject.on('click', function(e) {
            e.stopPropagation();
        });     
    },

    activateModal: function() {        
		var self = this;
        setTimeout(function() {            
            jQuery('.elementor-section-wrap').addClass('active-modal');             
            self.elementModalProject.addClass('active');
        }, 100);        
    },

    setupModalForProject: function(project_id) {
               
		var self = this;
        var project = false;

        // find selected project from list
        for(var i=0; i<this.items.length;i++) {
            if( this.items[i].id == project_id) {
                project = this.items[i];
            }
        }        
        
        var modalContent = document.createElement("div");
        jQuery(modalContent).addClass('modal-content');        
        
        // add close buttom
        var btnClose = document.createElement("a");
        jQuery(btnClose).addClass('modal-close');    
        jQuery(btnClose).text('x');    
        jQuery(btnClose).attr('href', 'javascript:;');    
        jQuery(modalContent).append(btnClose);  
        jQuery(btnClose).on('click', function() {
            self.killModal();
        });


        var imageCtn = document.createElement("div");
        jQuery(imageCtn).addClass('img-container');    
        var modalImage = document.createElement("img");
        modalImage.setAttribute('src', project.image);
        jQuery(imageCtn).append(modalImage);
        jQuery(modalContent).append(imageCtn);
        

        if( project.web != "" ) {

            var webContent = document.createElement("div");
            var title = document.createElement("h3");
            var text = document.createElement("p");     
                    
            var urlLabel = document.createElement("span");       
            var url = document.createElement("a");   
            var lineBreak = document.createElement("br");
            

            jQuery(title).text(project.name);
            jQuery(text).text(project.text);
            jQuery(url).attr('href', project.web.url);
            jQuery(url).attr('target', '_blank');
            jQuery(url).text(project.web.url);
            jQuery(urlLabel).text("Visit website");

            jQuery(webContent).addClass('web-content');
            jQuery(webContent).append(title);
            jQuery(webContent).append(text);
            jQuery(webContent).append(urlLabel);
            jQuery(webContent).append(lineBreak);
            jQuery(webContent).append(url);

            
            // var details_btn = document.createElement("a");
            // jQuery(details_btn).addClass('btn-more');
            // jQuery(details_btn).attr('href', project.web.details_url)
            // jQuery(details_btn).text("View project");
            //jQuery(webContent).append(details_btn);

            jQuery(modalContent).append(webContent);
        }
        else {
            //activate zoom
            jQuery(imageCtn).zoom();
        }


		this.elementModalProject.append(modalContent);
        
    },
    
    fetch_data: function(_callback) {
		jQuery.ajax({
			url: dondata.ajax_url,
			data: {
				action:'get_projects',
			},   
			success: function(response){				
				var obj = jQuery.parseJSON(response);	
				if( obj.type == "success" ) {
					_callback(obj.data);
				}
			}, 
			error: function(data) {
				console.log("error projects ajax");
			}
		});
	}

};