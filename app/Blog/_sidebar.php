<h3>Autres publications</h3>
<hr>
<div class="sidebar-content">
    <div class="bloc search-form hide">
        <h4>Par mot-clé</h4>
        <form action="/" class="form-underlined" method="post" enctype="multipart/form-data">
            <div class="form-col2">
                <input type="text" placeholder="Entrez un mot-clé...">
                <button type="submit"><i class="lni lni-arrow-right"></i></span></button>
            </div>                    
            
        </form>
    </div>
    <div class="bloc">
        <h4>Par catégories</h4>
        <ul>
        <?php foreach($data['categories'] as $slug => $name): ?>
            <li><a href="/<?php echo $slug; ?>"><?php echo $name; ?></a></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <div class="bloc">
        <h4>Par mot-clé</h4>
        <ul>
        <?php foreach($data['keywords'] as $slug => $name): ?>
            <li><a href="/<?php echo $slug; ?>"><?php echo $name; ?></a></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <div class="bloc hide">
        <h4>Archives</h4>
        <ul>
            <li><a href="#">2024</a></li>
            <li><a href="#">2023</a></li>
            <li><a href="#">2020-2022</a></li>
        </ul>
    </div>
</div>