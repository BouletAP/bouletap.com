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


    </script>

    <?php Models\Services\Analytics::i()->add_footer_script(); ?>
</body>
</html>