    <div class="footer-container">
        <?php include('template-parts/layouts/footer.php'); ?>
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


        <?php if(Tracking::i()->newly_created): ?>
            var king_t = '<?php echo Tracking::i()->tracker_id; ?>';
            var king_info = screen.width + ";" + screen.height + ";" + screen.colorDepth + ";" + screen.pixelDepth;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/ajax');
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("request_type=kingdata&t="+king_t+"+&i="+encodeURIComponent(king_info));
        <?php endif; ?>
    </script>
</body>
</html>