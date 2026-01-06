<?php
/*
Template Name: Page Contact
*/
get_header();
?>

<main class="contact-page">

    <section class="contact-container">
        <h1>Nous contacter</h1>

        <form method="post" class="contact-form">
            <input type="email" name="email" placeholder="Votre email" required>

            <input type="text" name="subject" placeholder="Votre demande / besoin" required>

            <textarea name="message" placeholder="Votre message" required></textarea>

            <button type="submit" name="send_contact">Envoyer</button>
        </form>

        <?php
        if (isset($_POST['send_contact'])) {

            $email   = sanitize_email($_POST['email']);
            $subject = sanitize_text_field($_POST['subject']);
            $message = sanitize_textarea_field($_POST['message']);

            $to = get_option('admin_email');
            $headers = ['Content-Type: text/html; charset=UTF-8'];

            if (wp_mail($to, $subject, $message, $headers)) {
                echo '<p class="success">Message envoyé avec succès.</p>';
            } else {
                echo '<p class="error">Erreur lors de l\'envoi.</p>';
            }
        }
        ?>
    </section>

</main>

<?php get_footer(); ?>
