<title>Administration André-Philippe Boulet</title>  
</head>

<body class="home">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="page-header">
                <span class="subtitle">Administration</span>
                <h1>Taleau de bord administrateur</h1>       
                
                <p><a href="javascript:delayedPush();" class="btn-cta">ENVOYER UNE NOTIFICATION <i class="lni lni-play"></i></a></p>
            </div>

        </section>


        <section class="dashboard-content">

            <div class="col">
                <h2>Formulaires</h2>

                <?php if( !empty($data['entries']) ): ?>
                    <ul>
                    <?php foreach($data['entries'] as $entry): ?>
                        <li><a href="#?id=<?php $entry['id']; ?>">
                        <?php
                            echo $entry['data'];
                        ?>
                        </a></li>
                    <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    Aucune entrée récente
                <?php endif; ?>
            </div>

            <div class="col">
                <h2>Récents utilisateur</h2>
                <p>Web socket response: <span id="socket_response">-</span</p>
            </div>

            <div class="col">
                <h2>Pages visitées</h2>
            </div>


        </section>
       


        <script>


            function delayedPush() {
                setTimeout(() => {
                pushNotify();
            }, 4000);
            }

            function pushNotify() {
                if (!("Notification" in window)) {
                    // checking if the user's browser supports web push Notification
                    alert("Web browser does not support desktop notification");
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    
                    var data = {
                        "request_type": 'testnotification'
                    };
                    var post_data = new URLSearchParams(data).toString(); 

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/ajax');
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function() {
                        
                        if (this.readyState == 4 && this.status == 200) {
                            var response = JSON.parse(this.responseText);
                            
                            console.log(response);
                            notification = createNotification(response.title, response.icon, response.body, response.url);

                            // closes the web browser notification automatically after 5 secs
                            setTimeout(function() {
                                notification.close();
                            }, 10000);
                        }
                    }; 

                    xhr.send(post_data);
                    
                    
                    // $.ajax({
                    //     url: "push-notify.php",
                    //     type: "POST",
                    //     success: function(data, textStatus, jqXHR) {
                    //         // if PHP call returns data process it and show notification
                    //         // if nothing returns then it means no notification available for now
                    //         if ($.trim(data)) {
                    //             var data = jQuery.parseJSON(data);
                    //             console.log(data);
                    //             notification = createNotification(data.title, data.icon, data.body, data.url);

                    //             // closes the web browser notification automatically after 5 secs
                    //             setTimeout(function() {
                    //                 notification.close();
                    //             }, 5000);
                    //         }
                    //     },
                    //     error: function(jqXHR, textStatus, errorThrown) { }
                    // });


                }
            };

            function createNotification(title, icon, body, url) {
                
                // navigator.serviceWorker.register('sw.js');
                // Notification.requestPermission(function(result) {
                // if (result === 'granted') {
                //     navigator.serviceWorker.ready.then(function(registration) {
                //     registration.showNotification(title);
                //     });
                // }
                // });
                
                var notification = new Notification(title, {
                    icon: icon,
                    body: body,
                });
                // url that needs to be opened on clicking the notification
                // finally everything boils down to click and visits right
                notification.onclick = function() {
                    window.open(url);
                };

                // navigator.serviceWorker.getRegistrations().then(function(registrations) {
                //     registrations[0].showNotification(title);
                // });

                var elemtn = document.querySelector('.dashboard-content');
                elemtn.style.backgroundColor = "#003399";
                return notification;
            }

        </script>

    </div>      


