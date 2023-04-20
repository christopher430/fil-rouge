<?php ob_start(); ?>

<div class="container mt-5 text-success">
    <div class="row">
        <div class="col-lg-6 bg-success-subtle rounded-5 h-50">
            <h1 class="text-center pt-3">Nous contacter</h1>
            <?= $msg ?>
            <form action="" method="POST" class="mt-3">
                <div class="row">
                    <div class="col-lg">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" placeholder="" name="name" required>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="mb-3">
                            <label for="forname" class="form-label">Prénom</label>
                            <input type="text" class="form-control" placeholder="" name="forname" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" cols="83" rows="10" required></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input bg-success" type="checkbox" required>
                    <label class="form-check-label">
                        J'accepte que mes données soit utilisées afin d'être contacté
                    </label>
                </div>
                <div class="my-3 text-center">
                    <button type="submit" class="btn btn-success w-25" name="submit">Envoyer</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <h1 class="text-center bg-success-subtle py-3 mb-0 rounded-top-5">Nous trouver</h1>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item rounded-bottom-5" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d83577.02189745272!2d6.996834167381874!3d49.10978301537392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47943576352cfa51%3A0xcde4dc2292a3eabb!2s7%20Rue%20des%20G%C3%A9n%C3%A9raux%20Cr%C3%A9mer%2C%2057200%20Sarreguemines!3m2!1d49.109789199999994!2d7.0668397!5e0!3m2!1sfr!2sfr!4v1680447314549!5m2!1sfr!2sfr" width="100%" height="570px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>