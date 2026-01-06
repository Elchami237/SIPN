import './bootstrap';

// Import Alpine.js
import Alpine from 'alpinejs';

import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/splide.min.css';

// Counter animation function
function animateCounter(element, target, suffix, duration) {
    console.log('Animating counter:', { element, target, suffix, duration });
    let current = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + suffix;
            console.log('Animation completed:', target + suffix);
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + suffix;
        }
    }, 16);
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing animations...');
    
    // Initialize Splide
    const splideElement = document.querySelector('.splide');
    if (splideElement) {
        new Splide('.splide', {
            type: 'fade',
            rewind: true,
            height: 700,
            autoplay: true,
            interval: 5000,
        }).mount();
    }


     
    
    // Stats counter animation with Intersection Observer
    const statsElements = document.querySelectorAll('[data-stats-counter]');
    console.log('Found stats elements:', statsElements.length);
    
    if (statsElements.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                console.log('Stats element intersecting:', entry.isIntersecting, entry.target);
                if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                    entry.target.classList.add('animated');
                    const element = entry.target;
                    const target = parseInt(element.dataset.statsCounter);
                    const suffix = element.dataset.statsSuffix || '';
                    const duration = parseInt(element.dataset.statsDuration) || 2000;
                    
                    console.log('Starting animation:', { target, suffix, duration });
                    
                    const counterElement = element.querySelector('.counter-value');
                    if (counterElement) {
                        animateCounter(counterElement, target, suffix, duration);
                    }
                }
            });
        }, { 
            threshold: 0.3,
            rootMargin: '0px 0px -50px 0px'
        });
        
        statsElements.forEach(el => observer.observe(el));
    }
    
    // General scroll animations
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    if (animatedElements.length > 0) {
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    entry.target.style.opacity = '1';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(el => scrollObserver.observe(el));
    }
});

// Initialize Alpine
window.Alpine = Alpine;
Alpine.start();

