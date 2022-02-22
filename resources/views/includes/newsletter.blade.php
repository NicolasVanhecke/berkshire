<div class="container my-10 mx-auto">
    <div class="mx-4 mt-4 sm:mt-12 lg:mt-24 flex flex-wrap justify-between">
        <div class="sm:w-full md:w-1/2 lg:w-1/2 px-4">
            <h3>The Duke of Berkshire</h3>
            <p>Knijfelingstraat 15</p>
            <p>B-8851 Koolskamp (België)</p>
            <p class="my-3"><a href="tel:+32479724676" >+32 (0)479 72 46 76</a></p>
            <p class="my-3"><a href="mailto:info@thedukeofberkshire.eu" class="uppercase">info@thedukeofberkshire.eu</a
        </div>
    </div>
    <div class="sm:w-full md:w-1/2 lg:w-1/2 px-4">
        <h3>{{ __( 'newsletter.title' ) }}</h3>
        <form action="/{{ app()->getLocale() }}/newsletter" method="post">
            @csrf
            <div class="form-input mb-4">
                <label class="font-bold" for="name">{{ __( 'newsletter.form-name' ) }}</label> <br />
                <input class="w-full input-field" type="text" name="name" placeholder="{{ __( 'newsletter.form-name-placeholder' ) }}">
            </div>
            <div class="form-input mb-4">
                <label class="font-bold" for="email">{{ __( 'newsletter.form-mail' ) }}</label> <br />
                <input class="w-full input-field" type="email" name="email" placeholder="{{ __( 'newsletter.form-mail-placeholder' ) }}">
            </div>
            <div class="form-input mb-4">
                <label class="font-bold" for="phone">{{ __( 'newsletter.form-phone' ) }}</label> <br />
                <input class="w-full input-field" type="phone" name="phone" placeholder="{{ __( 'newsletter.form-phone-placeholder' ) }}">
            </div>
            <div class="form-input mb-4">
                <label class="font-bold" for="question">{{ __( 'newsletter.form-message' ) }}</label> <br />
                <textarea class="w-full input-field" name="question" placeholder="{{ __( 'newsletter.form-message-placeholder' ) }}"></textarea>
            </div>

            <button type="submit" name="submit" class="submit-btn uppercase">{{ __( 'newsletter.submit-button' ) }}</button>
        </form>
    </div>
</div>
