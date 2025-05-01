<div :class="{'translate-x-full': !filterOpen}" class="filter-container shadowing cart-container bg-white z-20 fixed inset-y-0 right-0 top-0 transition ease-in-out duration-200 translate-x-full">
    <div class="flex flex-col items-center">
        <div class="close-container flex flex-row items-center">
            <button @click="filterOpen = ! filterOpen">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                    <path fill="#000000" d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z"/>
                </svg>
            </button>
        </div>

    </div>

    <div>
        <h2 class="flex flex-row justify-center items-center w-full">
            Filter
        </h2>
    </div>
    <div>
        <form action="" method="GET">
            <h3>
                Price Range
            </h3>
            <div class="input-label-container">
                <label for="min" class="block text-sm font-medium text-dark-green ">Minimum price</label>
                <input type="number" name="min" id="min" placeholder="0">
            </div>
            <div class="input-label-container">
                <label for="max" class="block text-sm font-medium text-dark-green ">Maximum price</label>
                <input type="number" name="max" id="max" placeholder="1000">
            </div>
            <h3>
                Rating
            </h3>
            <div class="flex flex-col items-baseline">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="input-label-container w-full flex flex-row">
                        <input type="radio" name="rating" id="rating-{{ $i }}" value={{ $i }}>
                        <label for="rating-{{ $i }}">
                            <div class="radio-labels flex flex-row">
                                @for ($j = 1; $j <= 5; $j++)
                                @if ($j <= $i)
                                    <svg class="filled" viewBox="0 0 24 24"> 
                                @else
                                    <svg viewBox="0 0 24 24">
                                @endif
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.19989 20.3953C5.12432 20.6752 5.04625 20.9642 4.96473 21.2631C4.81941 21.7959 4.26967 22.1101 3.73684 21.9648C3.20402 21.8194 2.88989 21.2697 3.03521 20.7369C3.11711 20.4366 3.19659 20.141 3.27481 19.8501C3.89341 17.5496 4.43255 15.5445 5.4577 13.856C6.65976 11.8761 8.47999 10.3833 11.6153 9.07691C12.1251 8.86449 12.7106 9.10557 12.923 9.61537C13.1354 10.1252 12.8944 10.7106 12.3846 10.9231C9.51993 12.1167 8.0902 13.3738 7.16728 14.894C6.29972 16.3229 5.8386 18.0304 5.19989 20.3953Z"
                                        fill="#323232" />
                                    <path
                                        d="M19.7876 2.63999C13.4875 1.13059 8.1545 2.16695 4.98951 5.03284C1.93684 7.79703 1.1376 12.0409 3.15904 16.6257C3.54045 15.4554 3.98936 14.3476 4.60288 13.3371C5.94458 11.1272 7.96014 9.51658 11.2307 8.15384C12.2503 7.72901 13.4212 8.21116 13.8461 9.23076C14.2709 10.2504 13.7888 11.4213 12.7692 11.8461C10.0401 12.9833 8.80547 14.1226 8.02204 15.413C7.44205 16.3682 7.05658 17.474 6.62903 18.9706C11.9349 18.773 15.6883 17.5773 18.1717 15.2934C20.7446 12.9272 21.7683 9.56634 21.9638 5.5431C22.0302 4.17924 21.1174 2.9586 19.7876 2.63999Z"
                                        fill="#323232" />
                                    </svg>
                                @endfor
                            </div>
                        </label>
                    </div>
                @endfor
            </div>
            <div class="button-container flex flex-row items-center">
                <button class="form-button">
                    Apply Filters
                </button>
                <input class="clear-button" type="reset" value="Clear Filters">
            </div>
        </form>
    </div>
</div>