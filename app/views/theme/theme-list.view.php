<div class="formulaire">
    <div class="titre">
        <h3>Choix du template</h3>
    </div>

    <div class="onglet-contenu" >
        <div class="theme-block ">
            <?php foreach ($list_template as $template) : ?>
                <div class="theme-block-content">
                    <h2 class="text-center"><?php echo $template['name']?></h2>

                    <hr>

                    <div class="image-container">
                        <div>
                            <span class="title <?php if ($template['statut'] == 1) echo 'selected'?> text-center"> Activé </span>
                            <span class="bg <?php if ($template['statut'] == 1) echo 'selected'?>"></span>
                            <img src="/img/<?php echo $template['thumbnail']?>" alt="thumbnail <?php echo $template['name']?>" >
                        </div>
                    </div>

                    <?php if ($template['statut'] != 1) : ?>

                        <a class="ajouter_element_btn" href="/theme/select/<?php echo $template['id']; ?>">Choisir</a>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>