<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/favicon.png" sizes="192x192" />

    <link rel="stylesheet" href="/medias/css/style.css" />
    <link rel="stylesheet" href="/medias/vendors/lineicons/lineicons.css" />
    <link rel="stylesheet" href="/medias/vendors/lineicons/dist5.0/lineicons.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    
    <script type='text/javascript' src='/medias/js/bouletap-forms.js'></script>
    

{{PAGE_CONTENT}}

    <div class="footer-container">
        <?php include('_footer.php'); ?>
    </div>
    
    <script type='text/javascript' src='/medias/js/stickymenu.js'></script>
    <script type='text/javascript' src='/medias/js/init.js'></script>
    <script>
        const elementClicked = document.querySelector("#btnMainMenuToggle");
        const mainMenu = document.querySelector("#mainMenuContainer");
        const mainHeader = document.querySelector("#main-header");

        elementClicked.addEventListener("click", ()=>{
            mainMenu.classList.toggle("is-open");
            mainHeader.classList.toggle("menu-opened");
        });


    </script>

    <?php Models\Services\Analytics::i()->add_footer_script(); ?>
</body>
</html>