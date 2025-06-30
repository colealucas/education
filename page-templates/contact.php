<?php
/**
 * Template name: Contacte
 * 
 */

get_header();

$get_static_text = [
    'ro' => [
        'our_address' => 'Adresa noastră',
        'phone' => 'Telefon',
        'email' => 'Email',
        'static_address' => 'Strada Șciusev, 53, 2012 Chișinău, Republica Moldova',
    ],
    'ru' => [
        'our_address' => 'Наш адрес',
        'phone' => 'Телефон',
        'email' => 'Эл. почта',
        'static_address' => 'Улица Щусева, 53, 2012 Кишинев, Республика Молдова',
    ]
];

?>

<section class="team-section py-40px md:py-72px">
    <div class="container">
        <div class="contacts-wrap">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-body bg-primary-light p-24px rounded-24px">
                            <h1 class="text-36px md:text-48px font-700 text-primary"><span><?php the_title(); ?></span></h1>

                            <div class="mt-20px text-16px text-primary">
                                <?php the_content(); ?>
                            </div>

                            <div class="contact-boxes mt-40px flex flex-col gap-16px">
                                <div class="contact-box flex gap-20px p-20px rounded-20px bg-white">
                                    <div class="w-[42px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                            <g clip-path="url(#clip0_212_189)">
                                            <path d="M35.8045 17.3509C35.8045 29.0175 20.8045 39.0175 20.8045 39.0175C20.8045 39.0175 5.8045 29.0175 5.8045 17.3509C5.8045 13.3726 7.38486 9.55732 10.1979 6.74427C13.0109 3.93123 16.8263 2.35088 20.8045 2.35088C24.7828 2.35088 28.5981 3.93123 31.4111 6.74427C34.2241 9.55732 35.8045 13.3726 35.8045 17.3509Z" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.8045 22.3509C23.5659 22.3509 25.8045 20.1123 25.8045 17.3509C25.8045 14.5895 23.5659 12.3509 20.8045 12.3509C18.0431 12.3509 15.8045 14.5895 15.8045 17.3509C15.8045 20.1123 18.0431 22.3509 20.8045 22.3509Z" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_212_189">
                                            <rect width="40" height="40" fill="white" transform="translate(0.804504 0.684204)"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="w-[calc(100%-62px)]">
                                        <div class="text-18px font-700 leading-120"><?php echo $get_static_text[get_lang()]['our_address']; ?></div>
                                        <div class="text-14px leading-150 mt-4px"><?php the_field('address'); ?></div>
                                    </div>
                                </div>

                                <div class="contact-box flex gap-20px p-20px rounded-20px bg-white">
                                    <div class="w-[42px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                            <g clip-path="url(#clip0_212_195)">
                                                <path d="M25.8878 9.22806C27.5157 9.54567 29.0118 10.3418 30.1846 11.5146C31.3574 12.6874 32.1535 14.1835 32.4711 15.8114M25.8878 2.56139C29.2699 2.93712 32.4238 4.45168 34.8315 6.85641C37.2393 9.26113 38.7578 12.4131 39.1378 15.7947M37.4711 29.0947V34.0947C37.473 34.5589 37.3779 35.0183 37.192 35.4436C37.006 35.8689 36.7333 36.2507 36.3913 36.5645C36.0492 36.8783 35.6454 37.1172 35.2057 37.2659C34.766 37.4146 34.3001 37.4698 33.8378 37.4281C28.7092 36.8708 23.7828 35.1183 19.4545 32.3114C15.4275 29.7525 12.0134 26.3383 9.45447 22.3114C6.63777 17.9634 4.88488 13.0131 4.33781 7.86139C4.29616 7.40051 4.35093 6.93599 4.49864 6.49743C4.64635 6.05887 4.88376 5.65588 5.19575 5.3141C5.50774 4.97232 5.88748 4.69924 6.31079 4.51226C6.7341 4.32528 7.19171 4.2285 7.65447 4.22806H12.6545C13.4633 4.2201 14.2475 4.50652 14.8607 5.03395C15.474 5.56137 15.8746 6.2938 15.9878 7.09473C16.1988 8.69484 16.5902 10.2659 17.1545 11.7781C17.3787 12.3746 17.4272 13.0229 17.2943 13.6462C17.1614 14.2695 16.8526 14.8416 16.4045 15.2947L14.2878 17.4114C16.6604 21.584 20.1152 25.0388 24.2878 27.4114L26.4045 25.2947C26.8576 24.8466 27.4297 24.5378 28.053 24.4049C28.6763 24.272 29.3246 24.3205 29.9211 24.5447C31.4333 25.109 33.0044 25.5004 34.6045 25.7114C35.4141 25.8256 36.1535 26.2334 36.682 26.8572C37.2106 27.481 37.4914 28.2774 37.4711 29.0947Z" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_212_195">
                                                <rect width="40" height="40" fill="white" transform="translate(0.804504 0.89473)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="w-[calc(100%-62px)]">
                                        <div class="text-18px font-700 leading-120"><?php echo $get_static_text[get_lang()]['phone']; ?></div>
                                        <div class="text-14px leading-150 mt-4px"><?php the_field('phone_numbers'); ?></div>
                                    </div>
                                </div>

                                <div class="contact-box flex gap-20px p-20px rounded-20px bg-white">
                                    <div class="w-[42px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                            <path d="M37.4712 10.3158C37.4712 8.48248 35.9712 6.98248 34.1378 6.98248H7.47115C5.63782 6.98248 4.13782 8.48248 4.13782 10.3158M37.4712 10.3158V30.3158C37.4712 32.1491 35.9712 33.6491 34.1378 33.6491H7.47115C5.63782 33.6491 4.13782 32.1491 4.13782 30.3158V10.3158M37.4712 10.3158L20.8045 21.9825L4.13782 10.3158" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="w-[calc(100%-62px)]">
                                        <div class="text-18px font-700 leading-120"><?php echo $get_static_text[get_lang()]['email']; ?></div>
                                        <div class="text-14px leading-150 mt-4px"><?php the_field('email'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-40px flex flex-wrap gap-10px items-center">
                                <?php if ( get_field('facebook_link') ) : ?>
                                <div>
                                    <a href="<?php the_field('facebook_link'); ?>" class="size-80px rounded-50 bg-white flex items-center justify-center" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <path d="M6.66673 4H25.3334C26.0406 4 26.7189 4.28095 27.219 4.78105C27.7191 5.28115 28.0001 5.95942 28.0001 6.66667V25.3333C28.0001 26.0406 27.7191 26.7189 27.219 27.219C26.7189 27.7191 26.0406 28 25.3334 28H6.66673C5.95948 28 5.28121 27.7191 4.78111 27.219C4.28101 26.7189 4.00006 26.0406 4.00006 25.3333V6.66667C4.00006 5.95942 4.28101 5.28115 4.78111 4.78105C5.28121 4.28095 5.95948 4 6.66673 4ZM24.0001 6.66667H20.6667C19.4291 6.66667 18.2421 7.15833 17.3669 8.0335C16.4917 8.90867 16.0001 10.0957 16.0001 11.3333V14.6667H13.3334V18.6667H16.0001V28H20.0001V18.6667H24.0001V14.6667H20.0001V12C20.0001 11.6464 20.1405 11.3072 20.3906 11.0572C20.6406 10.8071 20.9798 10.6667 21.3334 10.6667H24.0001V6.66667Z" fill="var(--primary-color)"/>
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>

                                <?php if ( get_field('x_link') ) : ?>
                                <div>
                                    <a href="<?php the_field('x_link'); ?>" class="size-80px rounded-50 bg-white flex items-center justify-center" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                            <path d="M30.4467 8C29.4201 8.46666 28.3134 8.77333 27.1667 8.92C28.3401 8.21333 29.2467 7.09333 29.6734 5.74666C28.5667 6.41333 27.3401 6.88 26.0467 7.14666C24.9934 6 23.5134 5.33333 21.8334 5.33333C18.7001 5.33333 16.1401 7.89333 16.1401 11.0533C16.1401 11.5067 16.1934 11.9467 16.2867 12.36C11.5401 12.12 7.31341 9.84 4.50007 6.38666C4.00674 7.22666 3.72674 8.21333 3.72674 9.25333C3.72674 11.24 4.72674 13 6.27341 14C5.32674 14 4.44674 13.7333 3.67341 13.3333V13.3733C3.67341 16.1467 5.64674 18.4667 8.26007 18.9867C7.42104 19.2163 6.5402 19.2482 5.68674 19.08C6.04888 20.2166 6.75812 21.2112 7.71476 21.9239C8.6714 22.6366 9.82733 23.0316 11.0201 23.0533C8.99825 24.6539 6.49207 25.5191 3.91341 25.5067C3.46007 25.5067 3.00674 25.48 2.55341 25.4267C5.08674 27.0533 8.10007 28 11.3267 28C21.8334 28 27.6067 19.28 27.6067 11.72C27.6067 11.4667 27.6067 11.2267 27.5934 10.9733C28.7134 10.1733 29.6734 9.16 30.4467 8Z" fill="var(--primary-color)"/>
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>

                                <?php if ( get_field('instagram_link') ) : ?>
                                <div>
                                    <a href="<?php the_field('instagram_link'); ?>" class="size-80px rounded-50 bg-white flex items-center justify-center" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <path d="M22.2041 2.61224C24.1093 2.61224 25.9365 3.36909 27.2837 4.71629C28.6309 6.06349 29.3878 7.89069 29.3878 9.79592V22.2041C29.3878 24.1093 28.6309 25.9365 27.2837 27.2837C25.9365 28.6309 24.1093 29.3878 22.2041 29.3878H9.79595C7.89072 29.3878 6.06352 28.6309 4.71632 27.2837C3.36912 25.9365 2.61228 24.1093 2.61228 22.2041V9.79592C2.61228 7.89069 3.36912 6.06349 4.71632 4.71629C6.06352 3.36909 7.89072 2.61224 9.79595 2.61224H22.2041ZM22.2041 0H9.79595C7.20029 0.00775213 4.71317 1.04231 2.87775 2.87772C1.04234 4.71313 0.00778265 7.20026 3.05176e-05 9.79592V22.2041C0.00778265 24.7997 1.04234 27.2869 2.87775 29.1223C4.71317 30.9577 7.20029 31.9922 9.79595 32H22.2041C24.7998 31.9922 27.2869 30.9577 29.1223 29.1223C30.9577 27.2869 31.9923 24.7997 32 22.2041V9.79592C31.9923 7.20026 30.9577 4.71313 29.1223 2.87772C27.2869 1.04231 24.7998 0.00775213 22.2041 0Z" fill="var(--primary-color)"/>
                                            <path d="M24.5355 5.55103C24.1655 5.55103 23.8037 5.66076 23.4961 5.86635C23.1884 6.07194 22.9486 6.36415 22.8069 6.70604C22.6653 7.04792 22.6283 7.42412 22.7005 7.78706C22.7727 8.15001 22.9509 8.48339 23.2125 8.74506C23.4742 9.00672 23.8076 9.18492 24.1705 9.25711C24.5335 9.32931 24.9097 9.29226 25.2516 9.15064C25.5934 9.00903 25.8856 8.76922 26.0912 8.46153C26.2968 8.15384 26.4066 7.7921 26.4066 7.42205C26.4066 7.17634 26.3582 6.93304 26.2641 6.70604C26.1701 6.47903 26.0323 6.27278 25.8586 6.09904C25.6848 5.92529 25.4786 5.78748 25.2516 5.69345C25.0245 5.59942 24.7812 5.55103 24.5355 5.55103Z" fill="var(--primary-color)"/>
                                            <path d="M16.0882 10.2759C17.2303 10.2752 18.3469 10.6133 19.2968 11.2474C20.2466 11.8815 20.9871 12.7831 21.4244 13.8381C21.8618 14.8932 21.9764 16.0542 21.7537 17.1744C21.5311 18.2945 20.9812 19.3235 20.1736 20.1311C19.3661 20.9387 18.3371 21.4886 17.2169 21.7112C16.0968 21.9339 14.9357 21.8193 13.8807 21.3819C12.8257 20.9445 11.9241 20.2041 11.29 19.2542C10.6559 18.3043 10.3177 17.1877 10.3184 16.0456C10.321 14.5162 10.9297 13.0501 12.0112 11.9686C13.0927 10.8872 14.5587 10.2784 16.0882 10.2759ZM16.0882 7.66361C14.4303 7.66683 12.8106 8.16145 11.4337 9.08494C10.0568 10.0084 8.98458 11.3194 8.35252 12.852C7.72045 14.3847 7.55691 16.0704 7.88257 17.696C8.20822 19.3216 9.00846 20.8142 10.1821 21.9851C11.3558 23.1561 12.8503 23.9528 14.4766 24.2747C16.103 24.5965 17.7883 24.4291 19.3195 23.7934C20.8507 23.1578 22.1591 22.0825 23.0794 20.7035C23.9996 19.3244 24.4905 17.7035 24.4898 16.0456C24.4894 14.9434 24.2716 13.852 23.849 12.834C23.4264 11.8159 22.8072 10.8912 22.0269 10.1127C21.2466 9.33416 20.3204 8.71713 19.3014 8.29689C18.2823 7.87666 17.1905 7.66146 16.0882 7.66361Z" fill="var(--primary-color)"/>
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>

                                <?php if ( get_field('linkedin_link') ) : ?>
                                <div>
                                    <a href="<?php the_field('linkedin_link'); ?>" class="size-80px rounded-50 bg-white flex items-center justify-center" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                            <g clip-path="url(#clip0_212_229)">
                                                <path d="M26.9 0H6.10003C3.00724 0 0.500031 2.50721 0.500031 5.6V26.4C0.500031 29.4928 3.00724 32 6.10003 32H26.9C29.9928 32 32.5 29.4928 32.5 26.4V5.6C32.5 2.50721 29.9928 0 26.9 0Z" fill="var(--primary-color)"/>
                                                <path d="M9.51003 11.77H4.99503V28.13H9.51003V11.77Z" fill="white"/>
                                                <path d="M24.6 11.77C21.27 10.5 18.86 12.65 17.83 13.85V11.77H13.33V28.13H17.83V19.5C17.8044 18.4062 18.2041 17.3451 18.945 16.54C19.1565 16.291 19.4171 16.0884 19.7105 15.9447C20.0038 15.8011 20.3237 15.7194 20.65 15.705C21.015 15.698 21.3776 15.7648 21.7162 15.9014C22.0547 16.038 22.3621 16.2416 22.62 16.5C23.1793 17.0844 23.4848 17.8662 23.47 18.675V28.13H28.55V18C28.55 18 29.115 13.46 24.6 11.77Z" fill="white"/>
                                                <path d="M7.25002 9.51C8.80747 9.51 10.07 8.24744 10.07 6.69C10.07 5.13255 8.80747 3.87 7.25002 3.87C5.69258 3.87 4.43002 5.13255 4.43002 6.69C4.43002 8.24744 5.69258 9.51 7.25002 9.51Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_212_229">
                                                <rect width="32" height="32" fill="white" transform="translate(0.500031)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>

                                <?php if ( get_field('youtube_link') ) : ?>
                                <div>
                                    <a href="<?php the_field('youtube_link'); ?>" class="size-80px rounded-50 bg-white flex items-center justify-center" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <path d="M13.3333 20L20.2533 16L13.3333 12V20ZM28.7466 9.56001C28.92 10.1867 29.04 11.0267 29.12 12.0933C29.2133 13.16 29.2533 14.08 29.2533 14.88L29.3333 16C29.3333 18.92 29.12 21.0667 28.7466 22.44C28.4133 23.64 27.64 24.4133 26.44 24.7467C25.8133 24.92 24.6666 25.04 22.9066 25.12C21.1733 25.2133 19.5866 25.2533 18.12 25.2533L16 25.3333C10.4133 25.3333 6.93329 25.12 5.55996 24.7467C4.35996 24.4133 3.58663 23.64 3.25329 22.44C3.07996 21.8133 2.95996 20.9733 2.87996 19.9067C2.78663 18.84 2.74663 17.92 2.74663 17.12L2.66663 16C2.66663 13.08 2.87996 10.9333 3.25329 9.56001C3.58663 8.36001 4.35996 7.58667 5.55996 7.25334C6.18663 7.08001 7.33329 6.96 9.09329 6.88C10.8266 6.78667 12.4133 6.74667 13.88 6.74667L16 6.66667C21.5866 6.66667 25.0666 6.88001 26.44 7.25334C27.64 7.58667 28.4133 8.36001 28.7466 9.56001Z" fill="var(--primary-color)"/>
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="the-map flex flex-col h-full relative mt-40px lg:mt-0">
                            <div id="contact-map" class="w-full h-full z-9 min-h-[600px]"></div>

                            <div class="entrance">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/entrance.png';  ?>" alt="">
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Initialize the map
                                var map = L.map('contact-map', {
                                    center: [47.018429, 28.829750],  // Coordinates for the map center
                                    zoom: 17,                    // Initial zoom level
                                    scrollWheelZoom: false       // Disable scroll wheel zoom
                                });
                                
                                // Add the base map layer (OpenStreetMap)
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: ''
                                }).addTo(map);

                                // Add a custom marker
                                var customIcon = L.icon({
                                    iconUrl: '<?php echo get_template_directory_uri() . '/assets/images/marker.png' ?>',
                                    iconSize: [64, 64], // Size of the icon
                                    iconAnchor: [38, 70], // Point of the icon which will correspond to marker's location
                                    popupAnchor: [-4, -60] // Point from which the popup should open relative to the iconAnchor
                                });

                                L.marker([47.018429, 28.829750], {icon: customIcon}).addTo(map)
                                    .bindPopup('<?php echo $get_static_text[get_lang()]['static_address']; ?>')
                                    //.openPopup();

                                // Event listener for map clicks to display coordinates
                                map.on('click', function(e) {
                                    var lat = e.latlng.lat;
                                    var lng = e.latlng.lng;

                                    // Display the coordinates in a popup
                                    console.log( 'lat: ' + lat.toFixed(4) + ' | lng: ' + lng.toFixed(4));
                                });
                            });
                            </script>

                    </div>
                </div>
                
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();

