const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-links');

burger.addEventListener('click', () => {
    nav.classList.toggle('active');
});


// Basic GSAP animations for the hero section
gsap.from(".hero-content h2", { duration: 1.5, opacity: 0, y: -50, ease: "power3.out", delay: 0.5 });
gsap.from(".hero-content p", { duration: 1.5, opacity: 0, y: 50, ease: "power3.out", delay: 1 });
gsap.from(".btn", { duration: 1.5, opacity: 0, scale: 0.8, ease: "back.out(1.7)", delay: 1.5 });

// Stagger animation for features
gsap.from(".feature-box", { duration: 1.5, opacity: 0, x: -100, stagger: 0.3 });







