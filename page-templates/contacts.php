<?php 
/* 
    Template Name: Contacts
*/

get_header();
?>
<style>
<?php include locate_template('assets/css/page-templates/page-contacts.css');
?>
</style>

<section class="get-in-touch">
    <div class="container get-in-touch--wrapper">
        <h1 class="get-in-touch__title">Contact Us</h1>
        <p class="get-in-touch__description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi libero
            architecto velit eaque, culpa eos.</p>

        <form method="GET" class="contacts" action="<?php echo admin_url('admin_ajax.php?action=send_mail');?>"
            id="contactUs">
            <input class="formDataValue" name="firstname" type="text" placeholder="Input your first name..">
            <input class="formDataValue" name="lastname" type="text" placeholder="Input your last name..">
            <input class="formDataValue" name="email" type="email" placeholder="Input your email..">
            <input class="formDataValue" name="phone" type="tel" placeholder="Input your phone..">
            <input class="formDataValue" name="subject" type="text" placeholder="Subject of the message">

            <textarea class="formDataValue" name="message" id="" cols="30" rows="5"
                placeholder="Input your message.."></textarea>
            <input class="button button-submit" type="submit" value="Send Message"></input>
        </form>
    </div>
</section>


<?php get_footer(); ?>