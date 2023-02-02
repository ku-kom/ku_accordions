/**
 * Link to open acoordion
 */

window.addEventListener('DOMContentLoaded', () => {
    'use strict';

    /**
     * Return if Bootstrap collapse is not present
     */
    if (typeof bootstrap.Collapse !== "function") {
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
                let accordionID = window.location.hash;
                // Open accordion
                const bsCollapse = new bootstrap.Collapse(accordionID, {
                    show: true
                });
                // SAcroll to accordion
                document.querySelector(accordionID).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    }

    slideToOpenAccordion();
});