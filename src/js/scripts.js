document.addEventListener("DOMContentLoaded", function() {

    const lang = (education_theme_localized && education_theme_localized.lang ? education_theme_localized.lang : 'ro'); // default to ro

    const translatedText = {
        'ro': {
            'bravo': 'Excelent! Ai realizat corect!',
            'mate': 'Excelent! Sunteți buni și la mate!',
            'continue': 'Continuă',
            'wordsToFind': 'cuvinte de găsit',
            'wordsFound': 'cuvinte descoperite',
        },
        'ru': {
            'bravo': 'Отлично! Ты сделал правильно!',
            'mate': 'Отлично! Вы хороши и в математике!',
            'continue': 'Продолжить',
            'wordsToFind': 'слов для поиска',
            'wordsFound': 'найденных слова',
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

    function updateYouTubeIframes() {
        // Get all iframe elements on the page
        const iframes = document.querySelectorAll('.flexible-content-section iframe');
    
        // Loop through each iframe
        iframes.forEach((iframe) => {
            // Check if the iframe is a YouTube video
            const src = iframe.src;
            if (src.includes('youtube.com/embed/')) {
                // Check if the ?rel=0 is already present
                if (!src.includes('?rel=0') && !src.includes('&rel=0')) {
                    // Append ?rel=0 or &rel=0 based on if there are existing query parameters
                    const separator = src.includes('?') ? '&' : '?';
                    iframe.src = src + separator + 'rel=0';
                }
            }
        });
    }
    
    // Call the function to update all YouTube iframes on the page
    updateYouTubeIframes();

    function isValidImageURL(tag) {
        const url = tag.href;
        const isValidExtension = /\.(jpg|png|webp)$/i.test(url);

        return isValidExtension;
    }

    function handleThemeContentLightbox() {
        const images = document.querySelectorAll('[class*="wp-image-"]');

        if (images.length) {
            images.forEach(function(img) {
                const parent = img.parentNode;

                // add lightbox only for a tags containing a image url in href attribute
                if (parent.nodeName.toLowerCase() === 'a' && isValidImageURL(parent)) {
                    parent.setAttribute('theme-fancybox', '');     
                }
            });
        }
    }
    handleThemeContentLightbox();

    // lightbox

    Fancybox.bind(".lightbox", {
        // Your custom options
        type: 'image',
        mainClass: "image-lightbox",
    });

    Fancybox.bind("[data-fancybox]", {
        // Your custom options
        backdropClick: false,
        closeButton: true,
        closeExisting: true,
        dragToClose: false,
        mainClass: "regular-lightbox",
    });

    Fancybox.bind("[theme-fancybox]", {
        backdropClick: true,
        closeButton: true,
        closeExisting: false,
        dragToClose: false,
        mainClass: "image-lightbox",
    });

    function handlePrintTheme() {
        const printButtons =  document.querySelectorAll('.print-button');

        if (printButtons.length) {
            printButtons.forEach(function(btn){
                btn.addEventListener("click", function(ev) {
                    //ev.preventDefault();
                    //window.print();
                });
            });
        }
    }
    handlePrintTheme();

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
                    const paragraphs = textSection.querySelectorAll('p:not(:first-child):not(.ignore)');

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
                        <div class="mt-16px"><a href="#" class="btn min-w-[200px]" data-fancybox-close>${continueText}</a></div>
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
    
        if (gamseSelector.length) {
            gamseSelector.forEach(function (gameWrapper) {
                const wordsDataAttribute = gameWrapper.getAttribute('data-words');
                const foundWordsDiv = gameWrapper.querySelector('.found-words');
                const gameStatus = gameWrapper.querySelector('.game-status');
    
                const letters = gameWrapper.querySelectorAll('.letter');
                let selectedLetters = [];
                let selectedElements = [];
    
                let jsWordsObject = JSON.parse(wordsDataAttribute); // Parse the string back into a JSON object
    
                if (!jsWordsObject || !jsWordsObject.length) {
                    console.warn('Words table game missing words!');
                    return false;
                }
    
                // Words to be found (all lowercase)
                const words = jsWordsObject;
    
                let foundWordsArray = [];
    
                function updateFoundWords() {
                    if (foundWordsArray.length >= words.length) { // words.length
                        showSuccessPopup( getText('bravo') );
                    }
    
                    if (foundWordsArray.length) {
                        let i = 0;
                        let startNumber = 1;
                        foundWordsDiv.innerHTML = ''; // Clear previous content
    
                        foundWordsArray.forEach(function (word, index) {
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
    
                        if (gameStatus) {
                            gameStatus.innerHTML = `<p class="text-center w-full">${foundWordsArray.length} / ${words.length} ${getText('wordsFound')}</p>`;
                        }
                    } else {
                        foundWordsDiv.innerHTML = ''; // Clear content if no words found
                    }
                }
    
                if (words.length && gameStatus) {
                    gameStatus.innerHTML = `<p class="text-center w-full">${words.length} ${getText('wordsToFind')}</p>`;
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

                            // bugfix: please keep using data-letter attribute to get the letter
                            selectedLetters.push(this.dataset.letter.toLowerCase()); // Ensure lowercase
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
                
                    // Ensure selection is in the same row or same column
                    const sameRow = selectedElements.every((el, i, arr) => 
                        el.getAttribute('data-row') === arr[0].getAttribute('data-row')
                    );

                    const sameColumn = selectedElements.every((el, i, arr) => 
                        el.getAttribute('data-column') === arr[0].getAttribute('data-column')
                    );

                    //console.log( sameRow, sameColumn);
                
                    if (!sameRow && !sameColumn) {
                        return;
                    }
                
                    // Check if the selected letters exactly match any word in the list
                    words.forEach(word => {
                        if (isExactMatch(currentWord, removeSpaces(word))) {
                            selectedElements.forEach(letter => {
                                letter.classList.remove('selected');
                                letter.classList.add('found');
                            });
                
                            if (foundWordsDiv) {
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

    function handleMatchArrows() {
        const gameWrappers = document.querySelectorAll('.match-arrows-game');
    
        if (gameWrappers.length) {
            gameWrappers.forEach(function (wrapper) {
                const leftItems = wrapper.querySelectorAll('.ma-item-left');
                const rightItems = wrapper.querySelectorAll('.ma-item-right');
                const totalItems = leftItems.length;
                let correctCounter = 0;
    
                let startItem = null;
                let endItem = null;
                let lastStatus = false;
    
                if (leftItems.length) {
                    leftItems.forEach(function (leftItem) {
                        leftItem.onclick = function (ev) {
                            ev.preventDefault();
    
                            if (!startItem) {
                                startItem = this;
    
                                if (!startItem.classList.contains('connected')) {
                                    startItem.classList.add('selected');
                                } else {
                                    startItem = null; // Reset if not valid
                                }
                            }
                        };
                    });
                }
    
                if (rightItems.length) {
                    rightItems.forEach(function (rightItem) {
                        rightItem.onclick = function (ev) {
                            ev.preventDefault();
                            endItem = this;
    
                            if (startItem && !startItem.classList.contains('connected')) {
                                // Check if the end item matches the expected target (add your logic here)
                                if (isCorrectMatch(startItem, endItem)) {
                                    lastStatus = true;

                                    startItem.classList.add('connected');
                                    startItem.classList.remove('selected');
                                    
                                    drawArrow(startItem, endItem, true);
                                    endItem.classList.add('success');

                                    correctCounter++;

                                    if ( correctCounter >= totalItems ) {
                                        // show success
                                        showSuccessPopup( getText('bravo') ); 
                                    }
                                } else {
                                    lastStatus = false;

                                    startItem.classList.remove('connected');
                                    startItem.classList.remove('selected');
                                    drawArrow(startItem, endItem, false);
                                    endItem.classList.add('error');

                                     // Remove the error status
                                     setTimeout(() => {
                                        endItem.classList.remove('error');
                                        endItem = null;
                                    }, 650);
                                }

                                startItem = null;
                            } else {
                                startItem = null;
                            }
                        };
                    });
                }

                function drawArrowHead(isSuccess) {
                    // Create an SVG marker for the arrowhead
                    const svg = wrapper.querySelector('.ma-arrows');
                    const marker = document.createElementNS('http://www.w3.org/2000/svg', 'marker');
                    marker.setAttribute('id', 'arrowhead');
                    marker.setAttribute('markerWidth', '10');
                    marker.setAttribute('markerHeight', '7');
                    marker.setAttribute('refX', '10');
                    marker.setAttribute('refY', '3.5');
                    marker.setAttribute('orient', 'auto');
                    marker.setAttribute('markerUnits', 'strokeWidth');
        
                    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    path.setAttribute('d', 'M0,0 L10,3.5 L0,7 Z');
                    path.setAttribute('style', 'fill: #808285;');
                    marker.appendChild(path);
        
                    svg.appendChild(marker);
                }
    
                function drawArrow(start, end, isSuccess) {
                    const svg = wrapper.querySelector('.ma-arrows');
                    const startRect = start.getBoundingClientRect();
                    const endRect = end.getBoundingClientRect();
                    const containerRect = wrapper.querySelector('.ma-container').getBoundingClientRect();
    
                    const x1 = startRect.right - containerRect.left;
                    const y1 = startRect.top + startRect.height / 2 - containerRect.top;
                    const x2 = endRect.left - containerRect.left;
                    const y2 = endRect.top + endRect.height / 2 - containerRect.top;
    
                    // Create a line with an arrowhead
                    const arrow = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                    arrow.setAttribute('x1', x1);
                    arrow.setAttribute('y1', y1);
                    arrow.setAttribute('x2', x2);
                    arrow.setAttribute('y2', y2);
                    arrow.setAttribute('marker-end', 'url(#arrowhead)');
                    arrow.setAttribute('style', `stroke: ${isSuccess ? '#808285' : '#808285'}; stroke-width: 2;`);
    
                    // Append the line to the SVG
                    svg.appendChild(arrow);

                    drawArrowHead(isSuccess);
    
                    if (!isSuccess) {
                        // Remove the line after a short delay for the error case
                        setTimeout(() => {
                            svg.removeChild(arrow);
                        }, 650);
                    }
                }
    
                function isCorrectMatch(startItem, endItem) {
                    // Add your logic here to check if the match is correct
                    // For example, compare data attributes or IDs
                    if ( startItem && endItem ) {
                        return startItem.dataset.id === endItem.dataset.id;
                    } else {
                        return false;
                    }
                }

            });
        }
    }
    
    handleMatchArrows();

    function handleCronoGame() {
        const wrappers = document.querySelectorAll('.crono-game-wrap');

        if (wrappers.length) {
            wrappers.forEach(function(wrapper) {
                const placeholders = wrapper.querySelectorAll('.crono-placeholder');
                const mixedItems = wrapper.querySelector('.crono-mixed-items');
                let draggedItem = null;
                let counter = 0;

                // bottom mixed items
                if (Sortable && mixedItems) {
                    Sortable.create(mixedItems, {
                        group: 'shared',
                        animation: 0,
                        sort: false,
                        onStart: function (evt) {
                            draggedItem = evt.item;
                        }
                    });
                }
                
                if (placeholders.length) {
                    placeholders.forEach(function(placeholder) {
                        Sortable.create(placeholder, {
                            group: 'shared',
                            animation: 0,
                            onAdd: function(evt) {
                                if (placeholder.children.length > 1) {
                                    // Remove the added item to enforce the one-item limit
                                    evt.from.appendChild(evt.item);
                                } 
                                    
                                placeholder.classList.add('ready');

                                const targetPlaceholder = evt.to;
                                const targetId = targetPlaceholder.id;
                                const correctTarget = draggedItem.dataset.target;

                                if (targetId === correctTarget) {
                                    evt.to.appendChild(evt.item);
                                    evt.item.classList.add('success');

                                    // if all good, item dragged and placed
                                    counter++;
                                } else {
                                    evt.item.classList.add('error');
                                    evt.from.appendChild(evt.item); // Return item to original list
                                }

                                setTimeout(() => {
                                    evt.item.classList.remove('error', 'success');
                                }, 700);

                                 // if completed
                                 if (counter >= placeholders.length ) {
                                    showSuccessPopup( getText('bravo') );
                                    
                                    if ( mixedItems ) {
                                        mixedItems.classList.add('hide');
                                    }
                                }
                            }
                        });
                    });
                }
            });
        }
    }
    handleCronoGame();

    function handleClickWords() {
        const wrappers = document.querySelectorAll('.click-words');

        if (wrappers) {
            wrappers.forEach(function(wrapper) {

                function walk(node) {
                    let child, next;
            
                    switch (node.nodeType) {
                        case 1:  // Element
                        case 9:  // Document
                        case 11: // Document fragment
                            child = node.firstChild;
                            while (child) {
                                next = child.nextSibling;
                                walk(child);
                                child = next;
                            }
                            break;
            
                        case 3: // Text node
                            handleText(node);
                            break;
                    }
                }
            
                function handleText(textNode) {
                    const words = textNode.nodeValue.split(/(\s+)/); // Keep spaces as separate elements
                    const fragment = document.createDocumentFragment();
            
                    words.forEach(function(word) {
                        if (/\S/.test(word)) { // Only wrap non-whitespace text
                            const span = document.createElement('span');
                            span.textContent = word;
                            span.classList.add('focus-span');
                            fragment.appendChild(span);
                        } else {
                            fragment.appendChild(document.createTextNode(word));
                        }
                    });
            
                    textNode.parentNode.replaceChild(fragment, textNode);
                }
            
                if (wrapper && wrapper.textContent.length ) {
                    walk(wrapper);
                }

                const focusSpans = document.querySelectorAll('.focus-span');

                if ( focusSpans ) {
                    focusSpans.forEach(function(span){
                        span.onclick = function() {
                            span.classList.toggle('clicked');
                        };
                    });
                }
            });
        }
    }
    handleClickWords();

    function handleSpotCorrectList() {
        const wrappers = document.querySelectorAll('.spot-correct-wrap');

        if (wrappers.length) {
            wrappers.forEach(function(wrapper){
                const list = wrapper.querySelector('.spot-correct-list');

                if (list) {
                    const lis = list.querySelectorAll('li');

                    if (lis) {
                        lis.forEach(function(li){
                            li.onclick = function(ev) {
                                ev.preventDefault();
                                const isCorrect = li.getAttribute('data-correct') === '1';

                                if ( isCorrect ) {
                                    li.classList.add('no-click', 'correct');
                                    list.classList.add('no-click');

                                    showSuccessPopup( getText('bravo') );
                                } else {
                                    li.classList.add('wrong', 'no-click');

                                    setTimeout(function() {
                                        li.classList.remove('wrong', 'no-click');
                                    }, 600);
                                }
                            };
                        });
                    }
                }
            });
        }
    }
    handleSpotCorrectList();

    function handleCuriosityClick(){
        const curiosities = document.querySelectorAll('.curiosity-img');

        if (curiosities.length) {
            curiosities.forEach(function(cur) {
                cur.onclick = function(ev) {
                    ev.preventDefault();

                    const parent = this.closest('.curiosity-item');
                    const content = (parent ? parent.querySelector('.curiosity-content') : null);

                    if (content) {
                        content.classList.toggle('hide');
                    }
                };
            });
        }
    }
    handleCuriosityClick();

    function handleSelectMultiple() {
        const items = document.querySelectorAll('[data-select-multiple-variant]');

        if (items.length) {
            items.forEach(function(item) {
                item.addEventListener('click', function() {
                    item.classList.toggle('selected');
                });
            });
        } 
    }
    handleSelectMultiple();

    function handleBooksSummary() {
        const headers = document.querySelectorAll('.book-sum-header'); 
        const moduleHeaders = document.querySelectorAll('.sum-module-header'); 

        if (headers.length) {
            headers.forEach(function(header) {
                header.addEventListener('click', function() {
                    header.parentNode.classList.toggle('open');
                    header.parentNode.querySelector('.book-sum-body').classList.toggle('hide');
                });
            });
        }

        if (moduleHeaders.length) {
            moduleHeaders.forEach(function(sumHeader) {
                sumHeader.addEventListener('click', function() {
                    sumHeader.parentNode.classList.toggle('open');
                    sumHeader.parentNode.querySelector('.sum-module-body').classList.toggle('hide');
                });
            });
        }
    }
    handleBooksSummary();

    function handleMitGame() {
        const wrappers = document.querySelectorAll('.mit-wrap');

        if (wrappers.length) {
            wrappers.forEach(function(wrapper) {
                const placeholders = wrapper.querySelectorAll('.mit-target');
                const mixedItems = wrapper.querySelector('.mit-elements');
                let draggedItem = null;
                let counter = 0;

                // bottom mixed items
                if (Sortable && mixedItems) {
                    Sortable.create(mixedItems, {
                        group: 'shared',
                        animation: 0,
                        sort: false,
                        onStart: function (evt) {
                            draggedItem = evt.item;
                        }
                    });
                }
                
                if (placeholders.length) {
                    placeholders.forEach(function(placeholder) {
                        Sortable.create(placeholder, {
                            group: 'shared',
                            animation: 0,
                            onAdd: function(evt) {
                                if (placeholder.children.length > 1) {
                                    // Remove the added item to enforce the one-item limit
                                    evt.from.appendChild(evt.item);
                                }
                                    
                                placeholder.classList.add('ready');

                                const targetPlaceholder = evt.to;
                                const targetId = targetPlaceholder.id;
                                const correctTarget = draggedItem.dataset.target;

                                if (targetId === correctTarget) {
                                    evt.to.appendChild(evt.item);
                                    evt.item.classList.add('success');

                                    // if all good, item dragged and placed
                                    counter++;
                                } else {
                                    evt.item.classList.add('error');
                                    evt.from.appendChild(evt.item); // Return item to original list
                                }

                                setTimeout(() => {
                                    evt.item.classList.remove('error', 'success');
                                }, 700);

                                 // if completed
                                 if (counter >= placeholders.length ) {
                                    showSuccessPopup( getText('bravo') );
                                    
                                    if ( mixedItems ) {
                                        mixedItems.classList.add('hide');
                                    }
                                }
                            }
                        });
                    });
                }
            });
        }
    }
    handleMitGame();

    function handleNumbersGame() {
        const wrappers = document.querySelectorAll('.numbers-wrap');

        if (wrappers.length) {
            wrappers.forEach(function(wrapper) {
                const numbers = wrapper.querySelectorAll('.numbers-item');

                if (numbers.length) {
                    numbers.forEach(function(number) {
                        number.addEventListener('click', function() {
                            if (number.classList.contains('correct')) {
                                number.classList.add('selected', 'no-click');
                                showSuccessPopup( getText('mate') );
                            } else {
                                number.classList.add('error');

                                setTimeout(function() {
                                    number.classList.remove('error');
                                }, 600);
                            }
                        });
                    });
                }
            });
        }
    }
    handleNumbersGame();


    // function handleNumbersGame() {
    //     const wrappers = document.querySelectorAll('.numbers-wrap');

    //     if (wrappers.length) {
    //         wrappers.forEach(function(wrapper) {

    //         });
    //     }
    // }
    // handleNumbersGame();

});