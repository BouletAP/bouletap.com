<?php
    require_once APP_PATH . '/models/forms/audit_seo.php';
    $audit_form = new Models\Forms\AuditSEO();
?>
<footer>
    <div class="call-to-action">
        <div class="company">
            <img decoding="async" src="/medias/images/logo.png" alt="André-Philippe Boulet">
            <p>André-<br>Philippe<br> Boulet</p>
        </div>
        <div class="description">
            <p>André-Philippe Boulet est un développpeur chaleureux, acharné et passionné qui souhaite aider votre entreprise à atteindre ses objectifs. Par une approche humaine et compréhensible, il utilise les technologies de l’information pour convertir vos besoins d’affaires en résultats.</p>
        </div>
        <div class="action">
            <a href="#" class="btn-cta"><i class="lni lni-popup"></i> Go</a>
        </div>
    </div>

    <div class="waves waves-footer">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 40" preserveAspectRatio="none">
            <path d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
        </svg>
    </div>
    
    <div class="footer-main">
        <div class="col col-contact">
            <span class="h3 title">Comment nous joindre</span>
            <ul>
                <li class="list-with-icons">
                    <i class="lni lni-home"></i>
                    <span>
                        <strong>Bureau à distance</strong><br />
                        196 rue du Richelieu<br />
                        Dunham, QC<br />
                        J0E 1M0
                    </span>
                </li>
                <li class="list-with-icons">
                    <i class="lni lni-envelope"></i>
                    <span><a href="/contact">info@bouletap.com</a></span>
                </li>
            </ul>
            <div class="socials">
                <ul>
                    <li><a href="https://www.facebook.com/logicielsbouletap/" title="Facebook link" target="_blank" rel="nofollow"><i class="lni lni-facebook-original"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/andr%C3%A9-philippe-boulet-50b2b216/" title="LinkedIn link" target="_blank" rel="nofollow"><i class="lni lni-linkedin-original"></i></a></li>
                    <li><a href="https://github.com/bouletap" title="Github link" target="_blank" rel="nofollow"><i class="lni lni-github-original"></i></a></li>
                    <li><a href="https://discord.gg/RAE5kkHFKC" title="Discord link" target="_blank" rel="nofollow"><i class="lni lni-discord"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="col col-horaire">
            <span class="h3 title">Heures d'ouverture</span>
            
            <p>
                Lundi et Vendredi<br />
                9.00AM - 11.30AM<br /><br />
                Mardi au Jeudi<br />
                9.00AM - 15.00PM<br /><br />
                Samedi et Dimanche<br />
                Fermé
            </p>

        </div>
        <div class="col col-navigation">
            <span class="h3 title">Navigation</span>
            <ul class="navigation">
                <li><a href="/a-propos">À Propos</a></li>
                <li><a href="#">Services offerts</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="/nouvelles">Articles et Nouvelles</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="col col-audit">
            <span class="h3 title">Audit SEO Gratuit</span>
            <p>Nous auditons gratuitement votre site dans les 72h, sans frais ni engagement</p>
            <div class="audit-form">
                







            
                <form action="/" class="form-seo-audit-1 form-state-error form-underlined" method="post" enctype="multipart/form-data">
                    <div class="form-error-message hide">
                        <span class="error-title">Le formulaire est invalide :</span>
                        <ul>
                            <li class="error_seoaudit1_courriel">Le format du courriel ne fonctionne pas</li>
                            <li class="error_seoaudit1_website">L'adresse URL ne fonctionne pas</li>
                        </ul>
                    </div>
                    <div class="form-col2">
                        <?php echo $audit_form->getField('seoaudit1_courriel')->display(); ?>
                        <?php echo $audit_form->getField('seoaudit1_website')->display(); ?>
                    </div>                    
                    
                    <button type="button" class="btn-submit" id="btn-submit-audit">
                        <span>Envoyer la demande <i class="lni lni-arrow-right"></i></span>
                    </button>
                </form>
                <script>

                    function submitSEOForm() {

                        var form_email = document.querySelector('input[name="seoaudit1_courriel"]').value;
                        var form_website = document.querySelector('input[name="seoaudit1_website"]').value;

                        var data = {
                            'request_type': 'form-audit-seo-2',
                            'email': form_email,
                            'website': form_website
                        };

                        var url = new URLSearchParams(data).toString(); 

                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '/ajax');
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.send(url);
                    }

                    // "#btn-submit-audit"
                    var btn_submit_seo1 = document.querySelector("#btn-submit-audit");
                    btn_submit_seo1.addEventListener("click", submitSEOForm);


                    // validations



                    // submit



                    // callback



                    
                </script>







            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="left">
        <a href="#"> © <?php echo date('Y'); ?> - André-Philippe Boulet - Tous droits réservés</a>
        </div>
        <div class="right">
            <div class="socials">
                <ul>
                    <li><a href="https://www.facebook.com/logicielsbouletap/" title="Facebook link" target="_blank" rel="nofollow"><i class="lni lni-facebook-original"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/andr%C3%A9-philippe-boulet-50b2b216/" title="LinkedIn link" target="_blank" rel="nofollow"><i class="lni lni-linkedin-original"></i></a></li>
                    <li><a href="https://github.com/bouletap" title="Github link" target="_blank" rel="nofollow"><i class="lni lni-github-original"></i></a></li>
                    <li><a href="https://discord.gg/RAE5kkHFKC" title="Discord link" target="_blank" rel="nofollow"><i class="lni lni-discord"></i></a></li>
                </ul>
            </div>
        </div>
    </div>  
</footer>