<?php if (have_rows('form')): ?>
    <?php while (have_rows('form')): the_row();
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $contact_form7_shortcode = get_sub_field('contact_form7_shortcode');
        ?>
        <section class="feedback">
            <div class="feedback__cont cont">
                <div class="feedback__grid grid">
                    <?php if (!empty($caption)) : ?>
                        <h2 class="feedback__title"><?php echo $caption; ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($text)) : ?>
                        <div class="feedback__main">
                            <p class="feedback__text"><?php echo $text; ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($contact_form7_shortcode)) : ?>
                        <?php echo do_shortcode($contact_form7_shortcode); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php /* ?>

 Example CF7 form

 <div class="form__grid grid">
    <div class="form__box">
        <div class="form__label">Merci de me recontacter par: *</div>
        <div class="form__line">
            <div class="form__check">
                <div class="check check--active">
                    <!-- real input element for check block is hidden but you can use it for form send -->
                    [checkbox checkbox-email class:check__input_cf7 "Email - True"]
                    <div class="check__box">
                        <img src="/wp-content/themes/matti/assets/img/i-check.svg" alt="Icon" class="check__icon">
                    </div>
                    <div class="check__label">Email</div>
                </div>
            </div>

            <div class="form__check">
                <div class="check">
                    <!-- real input element for check block is hidden but you can use it for form send -->
                    [checkbox checkbox-phone class:check__input_cf7 "Phone - True"]
                    <div class="check__box">
                        <img src="/wp-content/themes/matti/assets/img/i-check.svg" alt="Icon" class="check__icon">
                    </div>
                    <div class="check__label">Téléphone</div>
                </div>
            </div>

        </div>
    </div>

    <div class="form__box form__box--half">
        <div class="form__label">Nom complet *</div>
        <div class="form__el">
            [text* your-name class:form__input placeholder "Enter your full name…"]
        </div>
    </div>

    <div class="form__box form__box--half">
        <div class="form__label">Adresse email *</div>
        <div class="form__el">
            [email* your-email class:form__input placeholder "Enter your email address…"]
        </div>
    </div>

    <div class="form__box">
        <div class="form__label">Adresse email *</div>
        <div class="form__ta-wrapper">
            [textarea* your-message class:form__ta 100x placeholder "Type your message here…"]
        </div>
    </div>

    <div class="form__box">
        <div class="form__check">
            <div class="check js-form-agree">
                <input type="checkbox" class="check__input">

                <div class="check__box">
                    <img src="/wp-content/themes/matti/assets/img/i-check.svg" alt="Icon" class="check__icon">
                </div>
                <div class="check__label">En soumettant ce formulaire, j'accepte que mes données puissent être conservées par Chaletbau Matti dans le but de me contacter à des fins commerciales </div>
            </div>
        </div>
    </div>

    <div class="form__box">
        [submit class:form__btn class:btn-simple class:btn-simple--disabled class:js-btn-submit "ENVOYER VOTRE MESSAGE"]
    </div>
</div>

 */ ?>