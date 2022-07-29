<?php //Note: not used in frontend, this example html form for cf7. ?>
<form action="#" class="feedback__form form">
    <div class="form__grid grid">
        <div class="form__box">
            <div class="form__label">Merci de me recontacter par: *</div>
            <div class="form__line">
                <div class="form__check">
                    <div class="check check--active">

                        <?php //real input element for check block is hidden but you can use it for form send ?>
                        <input type="checkbox" class="check__input">

                        <div class="check__box">
                            <img src="<?php get_image('i-check.svg'); ?>" alt="Icon" class="check__icon">
                        </div>
                        <div class="check__label">Email</div>
                    </div>
                </div>

                <div class="form__check">
                    <div class="check">
                        <input type="checkbox" class="check__input">
                        <div class="check__box">
                            <img src="<?php get_image('i-check.svg'); ?>" alt="Icon" class="check__icon">
                        </div>
                        <div class="check__label">Téléphone</div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form__box form__box--half">
            <div class="form__label">Nom complet *</div>
            <div class="form__el">
                <input type="text" class="form__input" placeholder="Enter your full name…" required>
            </div>
        </div>

        <div class="form__box form__box--half">
            <div class="form__label">Adresse email *</div>
            <div class="form__el">
                <input type="text" class="form__input" placeholder="Enter your email address…" required>
            </div>
        </div>

        <div class="form__box">
            <div class="form__label">Adresse email *</div>
            <div class="form__ta-wrapper">
                <textarea class="form__ta" placeholder="Type your message here…" required></textarea>
            </div>
        </div>

        <div class="form__box">
            <div class="form__check">
                <div class="check js-form-agree">
                    <input type="checkbox" class="check__input">

                    <div class="check__box">
                        <img src="<?php get_image('i-check.svg'); ?>" alt="Icon" class="check__icon">
                    </div>
                    <div class="check__label">En soumettant ce formulaire, j'accepte que mes données
                        puissent être conservées par Chaletbau Matti dans le but de me contacter à
                        des fins commerciales
                    </div>
                </div>
            </div>
        </div>

        <div class="form__box">
            <button class="form__btn btn-simple btn-simple--disabled js-btn-submit" type="submit">
                ENVOYER VOTRE MESSAGE
            </button>
        </div>
    </div>
</form>