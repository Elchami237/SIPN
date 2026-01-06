// Animations au scroll avec Intersection Observer
document.addEventListener('DOMContentLoaded', function() {
    // Configuration de l'Intersection Observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    // Callback pour l'observer
    const observerCallback = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                entry.target.style.opacity = '1';
            }
        });
    };

    // Créer l'observer
    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Observer tous les éléments avec la classe 'animate-on-scroll'
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    animatedElements.forEach(el => observer.observe(el));

    // Animation des compteurs
    const animateCounter = (element, target, duration = 2000) => {
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target + (element.dataset.suffix || '');
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current) + (element.dataset.suffix || '');
            }
        }, 16);
    };

    // Observer pour les compteurs
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                const target = parseInt(entry.target.dataset.target);
                animateCounter(entry.target, target);
            }
        });
    }, { threshold: 0.5 });

    // Observer tous les compteurs
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => counterObserver.observe(counter));

    // Smooth scroll pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animation du header au scroll
    let lastScroll = 0;
    const header = document.querySelector('header');
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            header.classList.add('shadow-lg');
        } else {
            header.classList.remove('shadow-lg');
        }
        
        lastScroll = currentScroll;
    });

    // Parallax effect pour les sections hero
    const heroSections = document.querySelectorAll('.hero-parallax');
    window.addEventListener('scroll', () => {
        heroSections.forEach(section => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.5;
            section.style.transform = `translate3d(0, ${rate}px, 0)`;
        });
    });
});

// Alpine.js directive personnalisée pour les animations
document.addEventListener('alpine:init', () => {
    Alpine.directive('animate', (el, { expression }, { evaluate }) => {
        const animation = evaluate(expression);
        el.classList.add('animate-on-scroll');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    el.classList.add(animation);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.1 });
        
        observer.observe(el);
    });
});
