<nav class="py-4 sm:py-8 lg:py-8 sm:px-4 lg:px-10 flex justify-between items-center">
    <img src="/images/dob-logo.svg">

    <div class="socials h-full flex justify-between items-center">
        <a href="https://www.facebook.com/thedukeofberkshire/" class="mx-3">
            <img src="/images/facebook.svg" alt="">
        </a>
        <a href="https://www.instagram.com/thedukeofberkshire" class="mx-3">
            <img src="/images/instagram.svg" alt="">
        </a>

        <div x-data="{ open: false }" x-on:click.outside="open = false" class="locale-wrapper">
            <button x-on:click="open = !open" class="locale-btn uppercase flex items-center">
                {{ app()->getLocale() }}
                <img src="/images/down-arrow.svg" class="arrow-down pl-2">
            </button>
            <ul x-show="open">
                <li><a href="/setlocale/nl">NL</a></li>
                <li><a href="/setlocale/en">EN</a></li>
            </ul>
        </div>
     </div>
</nav>
