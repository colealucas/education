document.addEventListener("DOMContentLoaded", function() {

    const lang = (education_theme_localized && education_theme_localized.lang ? education_theme_localized.lang : 'ro'); // default to ro

    const translatedText = {
        'ro': {
            'bravo': 'Bravo',
            'continue': 'Continuă',
        },
        'ru': {
            'bravo': 'Браво',
            'continue': 'Продолжить',
        },
    };

    /**
     * Get translated text
     * 
     * @param {*} key 
     * @returns string
     */
    function getText(key) {
        let response = '';

        if (key && translatedText[lang][key] ) {
            response = translatedText[lang][key];
        }

        return response;
    }

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

    /**
     * Display success feedback
     * 
     * @param {*} message 
     */
    function showSuccessPopup(message) {
        if ( !message ) {
            message = getText('bravo') + '!';
        }

        const continueText = getText('continue');

        new Fancybox(
            [
                {
                src: `<div class="py-40px px-24px rounded-24px min-w-[450px] flex flex-col gap-12px text-center">
                        <div>
                            <svg height="60px" width="60px" class="inline-block" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                viewBox="0 0 473.931 473.931" xml:space="preserve">
                            <circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
                            <g>
                                <path style="fill:#ED3533;" d="M182.13,109.97c-14.133,0-27.262,6.892-35.154,18.432l-1.628,2.069l-1.089-1.388
                                    c-7.802-11.962-20.954-19.109-35.232-19.109c-24.363,0-42.042,17.684-42.042,42.039c0,35.962,65.107,88.968,69.855,92.784
                                    c2.241,2.144,5.175,3.323,8.288,3.323s6.047-1.175,8.288-3.326c4.763-3.847,70.753-57.683,70.753-92.781
                                    C224.169,127.654,206.489,109.97,182.13,109.97z"/>
                                <path style="fill:#ED3533;" d="M366.696,109.97c-14.133,0-27.262,6.892-35.154,18.432l-1.628,2.069l-1.089-1.388
                                    c-7.802-11.962-20.954-19.109-35.232-19.109c-24.363,0-42.042,17.684-42.042,42.039c0,35.962,65.107,88.968,69.855,92.784
                                    c2.241,2.144,5.175,3.323,8.288,3.323c3.109,0,6.043-1.175,8.288-3.326c4.76-3.843,70.749-57.683,70.749-92.781
                                    C408.735,127.654,391.055,109.97,366.696,109.97z"/>
                            </g>
                            <path style="fill:#333333;" d="M343.254,316.86c-59.281,60.325-154.662,59.853-213.449-0.898c-8.4-8.681-21.616,4.561-13.227,13.227
                                c65.769,67.969,173.644,68.332,239.903,0.898C364.941,321.481,351.718,308.246,343.254,316.86L343.254,316.86z"/>
                            </svg>
                        </div>
                        <div class="text-24px font-600 my-8px leading-130">${message}</div>
                        <div><a href="#" class="btn min-w-[200px]" data-fancybox-close>${continueText}</a></div>
                    </div>`,
                type: "html",
                },
            ],
            {
                // Your custom options
                backdropClick: false,
                closeButton: true,
                closeExisting: false,
                dragToClose: true,
                autoFocus: false
            }
        );
    }
    
    function handleMatchdefinitions() {
        const wrappers = document.querySelectorAll('.match-definitions-wrap');

        if (wrappers.length) {
            wrappers.forEach(wrapper => {
                const words = wrapper.querySelectorAll('.word');
                const placeholders = wrapper.querySelectorAll('.placeholder');

                words.forEach(word => {
                    word.addEventListener('dragstart', handleDragStart);
                });

                placeholders.forEach(placeholder => {
                    placeholder.addEventListener('dragover', handleDragOver);
                    placeholder.addEventListener('drop', handleDrop);
                });
            });
        }

        function handleDragStart(event) {
            event.dataTransfer.setData('text/plain', event.target.dataset.word);
        }

        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event) {
            // Check if the placeholder already contains a correct word
            if (event.target.classList.contains('correct')) {
                return;
            }

            const draggedWord = event.dataTransfer.getData('text/plain');
            const targetWord = event.target.dataset.word;
            let wrapperSelector = null;
            let warpperWords = null;

            if (draggedWord === targetWord) {
                event.target.classList.add('correct');
                event.target.classList.remove('incorrect');
                event.target.innerText = draggedWord;
                
                // Remove the dragged word from the list of words
                const draggedElement = document.querySelector(`.word[data-word="${draggedWord}"]`);

                if (draggedElement) {
                    draggedElement.remove();
                }
            } else {
                // Only add incorrect class if the placeholder is not already correct
                if (!event.target.classList.contains('correct')) {
                    event.target.classList.add('incorrect');
                    event.target.classList.remove('correct');
                }
            }

            // set selectors
            if ( event.target && event.target.classList.contains('placeholder')) {
                const el = event.target;
                wrapperSelector = el.closest('.match-definitions-wrap');
                warpperWords = (wrapperSelector ? wrapperSelector.querySelector('.words') : null);

                if ( warpperWords ) {
                    const wordsItems = warpperWords.querySelectorAll('.word');
    
                    if ( wordsItems.length < 1 ) {
                        warpperWords.classList.add('hide');

                        // success state here all words placed
                        //console.log('Felicitari!');
                        showSuccessPopup();
                    }
                } else {
                    console.warn('cant find words..');
                }
            }
        }
    }

    handleMatchdefinitions();
});