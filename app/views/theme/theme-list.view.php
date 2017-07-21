<div class="formulaire">
    <div class="titre">
        <h3>Choix du template</h3>
    </div>

    <div class="onglet-contenu" >
        <div class="theme-block">
            <?php foreach ($list_template as $template) : ?>
                <div class="theme-block-content">
                    <h2><?php echo $template['name']?></h2>
                <?php if ($template['statut'] == 1) {
                        echo "<span>Activé</span>";
                    } else {
                        echo "<a href='/theme/select/". $template['id'] ."'>Choisir</a>";
                    }

                ?>
                    
                <img src="/img/<?php echo $template['thumbnail']?>" alt="thumbnail <?php echo $template['name']?>" >
                

                </div>
                

            <?php endforeach; ?>
        </div>
    </div>
</div>