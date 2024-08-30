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
                            <svg width="80px" height="80px" class="inline-block" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                                <defs><style>.cls-1{fill:#00665E;}.cls-2{fill:#ffb300;}</style></defs><title/>
                                <path class="cls-1" d="M41.78,57.13a7.12,7.12,0,0,1-4.2-1.39l-4.32-3.16a3.12,3.12,0,0,0-3.7,0l-4.32,3.16a7.14,7.14,0,0,1-11.31-6.53l.58-5.32a3.11,3.11,0,0,0-1.85-3.2L7.77,38.53a7.13,7.13,0,0,1,0-13.06l4.89-2.16a3.11,3.11,0,0,0,1.85-3.2l-.58-5.32A7.14,7.14,0,0,1,25.24,8.26l4.32,3.16a3.12,3.12,0,0,0,3.7,0l4.32-3.16A7,7,0,0,1,43,7a7.25,7.25,0,0,1,4.75,3.13,2,2,0,1,1-3.34,2.2,3.23,3.23,0,0,0-2.12-1.39,3,3,0,0,0-2.37.57l-4.32,3.16a7.13,7.13,0,0,1-8.43,0l-4.31-3.16a3.13,3.13,0,0,0-5,2.87l.58,5.31A7.11,7.11,0,0,1,14.28,27l-4.9,2.16a3.14,3.14,0,0,0,0,5.74L14.28,37a7.11,7.11,0,0,1,4.21,7.3l-.58,5.31a3.13,3.13,0,0,0,5,2.87l4.31-3.16a7.13,7.13,0,0,1,8.43,0l4.32,3.16a3.13,3.13,0,0,0,5-2.87l-.58-5.31A7.1,7.1,0,0,1,48.54,37l4.9-2.16a3.14,3.14,0,0,0,0-5.74L50.78,28a2,2,0,1,1,1.61-3.66l2.66,1.17a7.13,7.13,0,0,1,0,13.06l-4.89,2.16a3.13,3.13,0,0,0-1.86,3.2l.58,5.32a7,7,0,0,1-3.52,6.95A7.17,7.17,0,0,1,41.78,57.13Z"/><path class="cls-2" d="M31.64,39a2,2,0,0,1-1.42-.59l-8.61-8.61A2,2,0,1,1,24.44,27l7.2,7.2L57.08,8.72a2,2,0,0,1,2.82,2.83L33.05,38.4A2,2,0,0,1,31.64,39Z"/>
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


    function handleSquareTableGame() {
        const gamseSelector = document.querySelectorAll('.square-table-game');

        if ( gamseSelector.length ) {
            gamseSelector.forEach(function(gameWrapper) {
                const wordsDataAttribute = gameWrapper.getAttribute('data-words');
                const foundWordsDiv = gameWrapper.querySelector('.found-words');

                const letters = gameWrapper.querySelectorAll('.letter');
                let selectedLetters = [];
                let selectedElements = [];
                
                let jsWordsObject = JSON.parse(wordsDataAttribute); // Parse the string back into a JSON object

                if ( !jsWordsObject || !jsWordsObject.length ) {
                    console.warn('Words table game missing words!');
                    return false;
                }

                // Words to be found (all lowercase)
                const words = jsWordsObject;

                let foundWordsArray = [];

                function updateFoundWords() {
                    if ( foundWordsArray.length >= words.length ) { // words.legth
                        showSuccessPopup('Super!');
                    }

                    if (foundWordsArray.length) {
                        let i = 0;
                        let startNumber = 1;
                        foundWordsDiv.innerHTML = ''; // Clear previous content

                        foundWordsArray.forEach(function(word, index) {
                            if (index % 4 === 0) {
                                // Create a new <ol> tag every 2 words
                                var ol = document.createElement('ol');
                                ol.setAttribute('start', startNumber);
                                ol.classList.add('found-words-list');
                                foundWordsDiv.appendChild(ol);
                            }

                            // Create <li> and append to the current <ol>
                            var li = document.createElement('li');
                            li.textContent = word;
                            foundWordsDiv.lastChild.appendChild(li);

                            i++;
                            startNumber = i + 1; // Update start number for the next <ol>
                        });
                    } else {
                        foundWordsDiv.innerHTML = ''; // Clear content if no words found
                    }
                }

                if ( words.length ) {
                    foundWordsDiv.innerHTML += `<p class="text-center w-full">${words.length} cuvinte de gasit</p>`;
                }

                function removeSpaces(str) {
                    return str.replace(/\s+/g, ''); // Replace all whitespace characters with an empty string
                }

                letters.forEach((letter, index) => {
                    letter.addEventListener('click', function () {
                        const letterIndex = selectedElements.indexOf(this);

                        if (letterIndex === -1) {
                            // If the letter is not already selected, select it
                            this.classList.add('selected');
                            selectedLetters.push(this.innerText.toLowerCase()); // Ensure lowercase
                            selectedElements.push(this);
                        } else {
                            // If the letter is already selected, deselect it
                            this.classList.remove('selected');
                            selectedLetters.splice(letterIndex, 1);
                            selectedElements.splice(letterIndex, 1);
                        }

                        checkWord();
                    });
                });

                function checkWord() {
                    const currentWord = selectedLetters.join(''); // No need to convert to lowercase again

                    // Check if the selected letters exactly match any word in the list
                    words.forEach(word => {
                        // if (isExactMatch(currentWord, word)) { // old version here
                        if (isExactMatch(currentWord, removeSpaces(word))) {
                            selectedElements.forEach(letter => {
                                letter.classList.remove('selected');
                                letter.classList.add('found');
                            });
                            
                            if ( foundWordsDiv ) {
                                foundWordsArray.push(word);
                                updateFoundWords();
                            }

                            // Clear selection
                            selectedLetters = [];
                            selectedElements = [];
                        }
                    });
                }

                function isExactMatch(selected, word) {
                    if (selected.length !== word.length) {
                        return false;
                    }

                    // Create frequency counts for selected letters and the word
                    const countLetters = (str) => {
                        return str.split('').reduce((acc, char) => {
                            acc[char] = (acc[char] || 0) + 1;
                            return acc;
                        }, {});
                    };

                    const selectedCount = countLetters(selected);
                    const wordCount = countLetters(word);

                    // Compare the frequency counts
                    return Object.keys(wordCount).every(char => wordCount[char] === selectedCount[char]);
                }

                // end
            });
        }
    }

    handleSquareTableGame();
});