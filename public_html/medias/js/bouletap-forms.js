var BouletAPForms = {

    //toggleStickyMenuHolder : false, 
    form_is_submitting : false,
    current_form : false,

    // idea taken from Bryan Kyle (https://stackoverflow.com/questions/588263/how-can-i-get-all-a-forms-values-that-would-be-submitted-without-submitting)
    getFormData : function() {
        var kvpairs = [];
        for ( var i = 0; i < this.current_form.elements.length; i++ ) {
            var key = encodeURIComponent(this.current_form.elements[i].name);

            if( key != "")
                kvpairs[key] = encodeURIComponent(this.current_form.elements[i].value);
        }
        return kvpairs;
    },

    // state = true is form is submittable, false if we are sending the form
    toggleFormSubmissionState : function(state) {
        var btn_submit = this.current_form.querySelector('button[type="submit"]');

        if( !state ) {
            self.form_is_submitting = true;                      
            btn_submit.style.opacity = 0.7;

            btn_submit.innerHTML = "Envoi en cours ...";  
        }
        else {
            btn_submit.style.opacity = 1;
            self.form_is_submitting = false;
            btn_submit.innerHTML = 'Envoyez de nouveau <i class="lni lni-arrow-right"></i></span>';
        }        
    },

    submit : function (form) {

        var self = this;
        self.current_form = form;

        //prevent reclick while submitting
        if( self.form_is_submitting ) return false;

        self.toggleFormSubmissionState(false);

        var data_array = self.getFormData();
        data_array["request_type"] = 'form-contact';
        var data = {...data_array};
        
        var url = new URLSearchParams(data).toString(); 

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/ajax');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                self.dispatchResponse(response);
                self.toggleFormSubmissionState(true);
            }
            else {
                self.toggleFormSubmissionState(true);
            }
        }; 

        xhr.send(url);
    },
    
    
    // num500 = invalid form or classified as robot spam
    // num400 = field validation failed
    // num200 = form saved and email sent 
    dispatchResponse : function(response) {
        if( response['state'] == null )
            response['state'] = "400";

        var state = response['state'];
        console.log(state);

        switch(state) {
            case "300":
            case "200":
                // success
                this.show_success_message();
                break;
            case "400":
                // fields invalid
                var data = response['data'];
                this.show_validation_error(data);
                break;
            default: 
                // no spam allowed
                var data = {'spam/bots': 'Votre message est bloqué dans notre antispam'};
                this.show_validation_error(data);
                break;
        }

    },

    show_success_message : function() {
        var error_bloc = this.current_form.querySelector('.form-error-message');
        error_bloc.classList.add('hide');

        for ( var i = 0; i < this.current_form.elements.length; i++ ) {
            this.current_form.elements[i].classList.remove('validation-error');             
        }

        var btn_submit = this.current_form.querySelector('button[type="submit"]');
        btn_submit.classList.add('hide');

        var success_message = document.createElement('div');
        success_message.classList.add('success-message');
        success_message.innerHTML = 'Merci, votre message est envoyé';

        this.current_form.append(success_message);
    },

    show_validation_error : function(data) {

        // add error class to invalid fields
        for ( var i = 0; i < this.current_form.elements.length; i++ ) {
            this.current_form.elements[i].classList.remove('validation-error');             
        }
        for(var key in data){
            try {
                var error_field = this.current_form.querySelector('.formfield-'+key);
                error_field.classList.add('validation-error');
            } catch(e) {}            
        }

        var error_bloc = this.current_form.querySelector('.form-error-message');
        error_bloc.classList.add('hide');

        // remove old validation errors if they exists
        var old_errors = error_bloc.querySelector('ul');
        if( old_errors != null ) 
            old_errors.remove();

        // show validation error message
        var ul=document.createElement('ul');
        for(var key in data){
            var li=document.createElement('li');
            li.innerHTML = key + " : " + data[key];                              
            ul.appendChild(li);  
        } 
        error_bloc.appendChild(ul);
        error_bloc.classList.remove('hide');        
    },



	init: function() {
		// if( !this.toggleStickyMenuHolder ) {
        //     var self = this;
        //     self.toggleStickyMenuHolder = true;
        //     setTimeout(function() {
        //         var scroll = window.scrollY;
        //         var sectionHeader = document.getElementById('main-header');
        //         if( scroll > 0 ) {
        //             sectionHeader.classList.add('menu-sticky');
        //         }
        //         else {
        //             sectionHeader.classList.remove('menu-sticky');
        //         }
        //         self.toggleStickyMenuHolder = false;
        //     }, 100);
        // }
    }
};