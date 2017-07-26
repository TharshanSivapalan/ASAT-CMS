<div class="container">
    <h2 class="center">Nous contacter</h2>
    <hr class="souligne">

    <section class="deux">
        <article class="col">

            <address>
                <strong><?php echo htmlspecialchars($list_setting[0]['valeur']) ?></strong><br>
                <?php echo htmlspecialchars($list_setting[6]['valeur']) ?><br>
                <?php echo htmlspecialchars($list_setting[7]['valeur']) ?> <?php echo htmlspecialchars($list_setting[5]['valeur']) ?><br>
                <abbr title="Phone">+<?php echo htmlspecialchars($list_setting[8]['valeur']) ?></abbr><br><br>
                <p><?php echo htmlspecialchars($list_setting[10]['valeur']) ?></p><br>
                <a href="mailto:<?php echo htmlspecialchars($list_setting[9]['valeur']) ?>"><?php echo htmlspecialchars($list_setting[9]['valeur']) ?></a><br><br>
                <br>
            </address>
        </article>

        <article class="col">
            <form id="email-form" role="form" class="contact-form" action="/index/message" method="post">
                <div class="form-group">

                    <input type="email" name="email" id="email" placeholder="Email: " required="required">
                    <span ></span>
                </div>
                <div class="form-group">

                    <textarea  name="message" id="message" placeholder="Message: " rows="5" required="required" maxlength="1000"></textarea>
                    <span ></span>
                </div>
                <button type="submit" class="btn"><i class="fa fa-envelope-o"></i> Envoyer</button>
            </form>

        </article>
    </section>
</div>
