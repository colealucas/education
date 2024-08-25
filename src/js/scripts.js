document.addEventListener("DOMContentLoaded", function() {

    Fancybox.bind("[data-fancybox]", {
        // Your custom options
        backdropClick: false,
        closeButton: true,
        closeExisting: true,
        dragToClose: false,
    });

    if ( document.querySelector('#print-button') ) {
        document.querySelector('#print-button').addEventListener("click", function() {
            window.print();
        });
    }

    function animateScrollToAnchors() {
		if (window.location.hash) {
			// Prevent default browser behavior
			window.scrollTo(0, 0);

			setTimeout(function() {
				// Get the hash value
				var hash = window.location.hash.substring(1);
				// Find the element by ID
				var targetElement = document.getElementById(hash);
	
				if (targetElement) {
					// Calculate the offset (header height)
					//var headerOffset = document.querySelector('#site-header').offsetHeight; // Adjust this selector as needed
					var headerOffset = 80; // Adjust this selector as needed
	
					// Get the position of the target element
					var elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
	
					// Calculate the position considering the offset
					var offsetPosition = elementPosition - headerOffset;
	
					// Smooth scroll to the target position
					window.scrollTo({
						top: offsetPosition,
						behavior: 'smooth'
					});
				}
			}, 0);
		}
	}

	animateScrollToAnchors();

    function handleSmothScroll() {
        const s = document.querySelectorAll('a[href^="#"]:not([href="#"]):not(.ignore)');

        if ( s.length ) {
            // Set the header offset
            const headerOffset = 80;

            s.forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
        
                    // Get the target element by its ID
                    const target = document.querySelector(this.getAttribute('href'));
        
                    if (target) {
                        // Get the position of the target element minus the header offset
                        const elementPosition = target.getBoundingClientRect().top + window.scrollY;
                        const offsetPosition = elementPosition - headerOffset;
        
                        // Smoothly scroll to the calculated position
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        }
    }

    handleSmothScroll();

    function handleToggleActive() {
        const toggles = document.querySelectorAll('[data-toggle-active]');

        if ( toggles ) {
            toggles.forEach(function(item) {
                item.addEventListener('click', function(ev) {
                    ev.preventDefault();
                    const targetElementSelector = (this.getAttribute('data-toggle-active') ? this.getAttribute('data-toggle-active') : null );
                    const targetElement = (targetElementSelector ? document.querySelector(targetElementSelector) : null );

                    this.classList.toggle('active');

                    if (targetElement) {
                        targetElement.classList.toggle('active');
                    }
                });
            });
        }
    }

    handleToggleActive();

    function handleNotions() {
        const notionHeaders = document.querySelectorAll('[data-notion-title]');
    
        notionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const notionBody = header.nextElementSibling;
                const parent = header.parentNode;

                parent.classList.toggle('open');
    
                if (header.classList.contains('open')) {
                    // Close the accordion
                    notionBody.style.display = 'none';
                    header.classList.remove('open');
                } else {
                    // Open the accordion
                    notionBody.style.display = 'block';
                    header.classList.add('open');
                }
            });
        });
    }
    
    // Call the function to attach the event listeners
    handleNotions();

    function trifferNotionsFilter() {
        const notionFilterLinks = document.querySelectorAll('[data-voc-filter-link]');
        const notionsItems = document.querySelectorAll('[data-notion-box]');
        let filterLetter = null;

        if (notionFilterLinks.length) {
            notionFilterLinks.forEach(function(item) {
                if ( item.classList.contains('active') && item.getAttribute('data-voc-letter') && item.getAttribute('data-voc-letter').length ) {
                    filterLetter = item.getAttribute('data-voc-letter').trim().toLowerCase();
                }
            });

            if ( notionsItems.length ) {
                notionsItems.forEach(function(notion) {
                    if ( false === (notion.getAttribute('data-filter-letter') && notion.getAttribute('data-filter-letter') === filterLetter) ) {
                        notion.classList.add('hide');
                    } else {
                        notion.classList.remove('hide');
                    }
                });
            }
        }
        
        if(!filterLetter) {
            // display all notions if no filter applied
            if ( notionsItems.length ) {
                notionsItems.forEach(function(notion) {
                    notion.classList.remove('hide');
                });
            }
        }
    }

    function handleNotionsFilters() {
        const notionFilterLinks = document.querySelectorAll('[data-voc-filter-link]');

        if (notionFilterLinks.length) {
            notionFilterLinks.forEach(function(item) {
                item.onclick = function(ev) {
                    ev.preventDefault();

                    notionFilterLinks.forEach(function(link){
                        if (link !== item) {
                            link.classList.remove('active');
                        }
                    });

                    item.classList.toggle('active');
                    trifferNotionsFilter();
                };
            });
        }
    }

    handleNotionsFilters();

    function handleCheckmarks() {
        const checkmarks = document.querySelectorAll('.paragraph-check-options');

        if (checkmarks.length) {
            checkmarks.forEach(function(checkmarkOptions) {
                const knownInfo = checkmarkOptions.querySelector('.known');
                const newInfo = checkmarkOptions.querySelector('.new');

                if ( knownInfo && newInfo) {
                    knownInfo.addEventListener('click', function() {
                        newInfo.classList.remove('active');
                        knownInfo.classList.add('active');
                    });

                    newInfo.addEventListener('click', function() {
                        knownInfo.classList.remove('active');
                        newInfo.classList.add('active');
                    });

                } else {
                    console.warn('Missing checkmark options!');
                }
            });
        }
    }

    function handleCheckParagraphs() {
        const sections = document.querySelectorAll('.check-paragraphs');

        if ( sections.length ) {
            sections.forEach(function(textSection) {
                if ( textSection ) {
                    const paragraphs = textSection.querySelectorAll('p');

                    if ( paragraphs.length ) {
                        paragraphs.forEach(function(p) {
                            if ( p.textContent.trim().length ) {
                                const checkboxes = document.createElement('span');
                                checkboxes.classList.add('paragraph-check-options');
                                checkboxes.innerHTML = `<span class="known">
                                    <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>

                                <span class="new">+</span>`;

                                // Insert the <span> before the text content of the <p>
                                p.prepend(checkboxes);
                            }
                        });

                        handleCheckmarks();
                    }
                }
            });
        }
    }
    handleCheckParagraphs();
    
});