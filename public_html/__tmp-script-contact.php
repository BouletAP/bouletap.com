
<script>

    // idea taken from Bryan Kyle (https://stackoverflow.com/questions/588263/how-can-i-get-all-a-forms-values-that-would-be-submitted-without-submitting)
    function getFormData(form) {
        var kvpairs = [];
        for ( var i = 0; i < form.elements.length; i++ ) {
            kvpairs[encodeURIComponent(form.elements[i].name)] = encodeURIComponent(form.elements[i].value);
        }
        return kvpairs;
    }

    // state = true is form is submittable, false if we are sending the form
    function toggleFormSubmissionState(form, state) {
        var btn_submit = form.querySelector('button[type="submit"]');

        if( !state ) {
            btn_submit.innerHTML = "Envoi en cours ...";
            btn_submit.removeEventListener('click', submitContactForm);
            btn_submit.style.opacity = 0.7;
        }
        else {
            btn_submit.addEventListener('click', submitContactForm);
            btn_submit.innerHTML = 'Envoyez de nouveau <i class="lni lni-arrow-right"></i></span>';
            btn_submit.style.opacity = 1;
        }        
    }



    function submitContactForm() {

        var form = document.querySelector('#form-contact');
        toggleFormSubmissionState(form, false);

        // var btn_submit = document.querySelector("#btn-contact-submit");
        // btn_submit.innerHTML = "Envoi en cours ...";
        // btn_submit.removeEventListener('click', submitContactForm);
        // btn_submit.style.opacity = 0.7;

        // var courriel = document.querySelector('input[name="courriel"]').value;
        // var full_name = document.querySelector('input[name="full_name"]').value;
        // var phone = document.querySelector('input[name="phone"]').value;
        // var subject = document.querySelector('input[name="subject"]').value;
        // var message = document.querySelector('textarea[name="message"]').value;

        // var data = {
        //     'request_type': 'form-contact',
        //     'courriel': courriel,
        //     'full_name': full_name,
        //     'phone': phone,
        //     'subject': subject,
        //     'message': message
        // };

        var data_array = self.getFormData(form);
        data_array["request_type"] = 'form-contact';
        var data = {...data_array};

        var url = new URLSearchParams(data).toString(); 

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/ajax');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function(request) {
            console.log(request);

            if (request.readyState == 4 && request.status == 200) {
                //callback(request.responseText); // Another callback here

                // btn_submit.addEventListener('click', submitContactForm);
                // btn_submit.innerHTML = 'Envoyez de nouveau <i class="lni lni-arrow-right"></i></span>';
                // btn_submit.style.opacity = 1;
                toggleFormSubmissionState(form, true);
            }
            else {
                // btn_submit.addEventListener('click', submitContactForm);
                // btn_submit.innerHTML = 'Envoyez de nouveau <i class="lni lni-arrow-right"></i></span>';                
                // btn_submit.style.opacity = 1;
                toggleFormSubmissionState(form, true);
            }
        }; 

        xhr.send(url);
    }

    // "#btn-submit-audit"
    var submit = document.querySelector("#btn-contact-submit");
    submit.addEventListener("click", submitContactForm);


    // validations



    // submit



    // callback



    
</script>