// Scroll reveal: elements with [data-reveal] fade/slide in once when they enter the viewport.
// Children of [data-reveal-group] are revealed one after another (staggered).
document.querySelectorAll('[data-reveal-group]').forEach((group) => {
    [...group.children].forEach((el, i) => {
        if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', '');
        el.style.setProperty('--reveal-delay', `${Math.min(i, 8) * 80}ms`);
    });
});

const items = document.querySelectorAll('[data-reveal]');

if (!('IntersectionObserver' in window)) {
    items.forEach((el) => el.classList.add('is-visible'));
} else {
    const io = new IntersectionObserver(
        (entries) => entries.forEach((e) => {
            if (e.isIntersecting) {
                e.target.classList.add('is-visible');
                io.unobserve(e.target);
            }
        }),
        { threshold: 0.12, rootMargin: '0px 0px -6% 0px' }
    );
    items.forEach((el) => io.observe(el));
}