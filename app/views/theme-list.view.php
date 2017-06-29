<div class="formulaire">
    <div class="titre">
        <h3>Choix du template</h3>
    </div>

    <div class="onglet-contenu" >
        
        <?php foreach ($list_template as $template) : ?>

            <h2><?php echo $template['name']?></h2>
            <?php if ($template['statut'] == 1) : ?>
                <span>Activé</span>
            <?php endif; ?>
            <img src="/img/<?php echo $template['thumbnail']?>" alt="thumbnail <?php echo $template['name']?>" style="width: 400px">
            <a href="/theme/select/<?php echo $template['id']?>">Choisir</a>

        <?php endforeach; ?>

    </div>
</div>