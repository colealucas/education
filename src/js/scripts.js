document.addEventListener("DOMContentLoaded", function() {
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
                }
            });
        }
    }

    handleNotionsFilters();
    
});