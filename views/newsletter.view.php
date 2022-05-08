<?php include __DIR__ . '/inc/header.inc.php'; ?>


<section id="newsletter_section">

    <div id="newsletter_section_wrapper" class="main_wrapper">

        <div>

            <h1>Subscribe Our Newsletter</h1>
            <p id="h1_p">Fulfill the information form, and click button to receive our brief newsletter weekly!</p>

        </div>

        <form action="http://scott-media.com/test/form_display.php" method="post" id="content_form" autocomplete="on">
            <fieldset id="fs_1">
                <legend>Subscription Info</legend>
                <p>
                    <label for="account">Name : </label>
                    <input type="text" name="account" id="account" maxlength="50" title="Insert Your Name"
                        placeholder="Input your name" required="required">
                </p>

                <p>
                    <label for="email_addr">Email : </label>
                    <input type="email" name="email_addr" id="email_addr" maxlength="100" title="Insert Email Address"
                        placeholder="user@website.com" required="required">
                </p>

                <p>
                    <label for="phone">Telephone : </label>
                    <input type="tel" name="phone" id="phone" title="Insert Telephone Number" placeholder="123-123-1234"
                        required="required">
                </p>

                <p>
                    <label for="promo_code">Promo Code : </label>
                    <input type="number" name="promo_code" id="promo_code" title="Insert Your 9-digit Promo Code"
                        placeholder="123456789" required="required">
                </p>

                <p>
                    <label for="p_word">Password : </label>
                    <input type="password" name="p_word" id="p_word" maxlength="32" minlength="8"
                        title="Insert a password between 8 and 32 characters" placeholder="Insert password"
                        required="required">
                </p>

            </fieldset>


            <div id="third_fieldset">

                <p>

                    <label for="consent" style="width: max-content;">Do you consent our terms and conditions?</label>
                    <input type="checkbox" id="consent" name="consent" value="yes_consent">

                </p>

                <p>
                    <input type="submit" value="Send Form"> &nbsp;
                    <input type="reset" value="Clear Form"> &nbsp;
                </p>

            </div>

        </form>

    </div>

</section>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>