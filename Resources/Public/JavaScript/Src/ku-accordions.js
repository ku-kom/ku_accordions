/**
 * Link to open acoordion
 */

window.addEventListener('DOMContentLoaded', () => {
    'use strict';

    /**
     * Return if Bootstrap collapse is not present
     */
    if (typeof bootstrap.Collapse !== 'function') {
        return;
    }

    /**
     * Check for accessibility settings
     */
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    if (reduceMotion.matches) {
        return;
    }

    /**
     * Link to open accordion
     */
    const slideToOpenAccordion = () => {
        if (window.location.hash !== '') {
            // Open accordions based on the hash in the url
            let accordionExists = window.location.hash.indexOf('accordion-') >= 0;
            if (accordionExists) {
                const accordionID = window.location.hash; // Variable includes hash (#).
                // Open accordion
                const collapsibleElement = document.querySelector(accordionID);
                new bootstrap.Collapse(collapsibleElement).show();
                // Scroll to accordion
                document.querySelector(accordionID).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    }

    slideToOpenAccordion();
});
