document.addEventListener('DOMContentLoaded', function () {

    // Top loading bar (replaces full-screen spinner overlay)
    const bar = document.getElementById('loading-bar');
    if (bar) {
        bar.style.width = '30%';
        window.addEventListener('load', function () {
            bar.style.width = '100%';
            setTimeout(() => { bar.style.opacity = '0'; }, 300);
        });
    }

    // Mobile nav toggle
    const navToggle = document.getElementById('navToggle');
    const nav = document.getElementById('masthead-nav');
    if (navToggle && nav) {
        navToggle.addEventListener('click', () => nav.classList.toggle('show'));
        nav.querySelectorAll('a').forEach(a => a.addEventListener('click', () => nav.classList.remove('show')));
    }

    // Counter animation (stat numbers)
    const counters = document.querySelectorAll('[data-count]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { animateCounter(entry.target); counterObserver.unobserve(entry.target); }
        });
    }, { threshold: 0.4 });
    counters.forEach(el => counterObserver.observe(el));

    function animateCounter(el) {
        const target = parseInt(el.getAttribute('data-count'), 10) || 0;
        const duration = 1100;
        const start = performance.now();
        function tick(now) {
            const p = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.floor(eased * target).toLocaleString('id-ID');
            if (p < 1) requestAnimationFrame(tick); else el.textContent = target.toLocaleString('id-ID');
        }
        requestAnimationFrame(tick);
    }

    // Back to top
    const toTop = document.getElementById('backToTop');
    if (toTop) {
        window.addEventListener('scroll', () => toTop.classList.toggle('show', window.scrollY > 500));
        toTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    // Gallery filter (custom bordered tab bar, not bootstrap pills)
    const filterBtns = document.querySelectorAll('.gal-filter button');
    const galItems = document.querySelectorAll('.gal-figure');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            galItems.forEach(item => {
                const cat = item.getAttribute('data-category');
                item.classList.toggle('hide', !(filter === 'Semua' || filter === cat));
            });
        });
    });

    // Lightbox
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImage');
    const lightboxCap = document.getElementById('lightboxCaption');
    document.querySelectorAll('.lightbox-trigger').forEach(t => {
        t.addEventListener('click', function (e) {
            e.preventDefault();
            if (!lightbox) return;
            lightboxImg.src = this.getAttribute('href');
            lightboxCap.textContent = this.getAttribute('data-caption') || '';
            lightbox.classList.add('active');
        });
    });
    const lbClose = document.getElementById('lightboxClose');
    if (lbClose) lbClose.addEventListener('click', () => lightbox.classList.remove('active'));
    if (lightbox) lightbox.addEventListener('click', e => { if (e.target === lightbox) lightbox.classList.remove('active'); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape' && lightbox) lightbox.classList.remove('active'); });

    // Achievement tab bar (Akademik / Non Akademik)
    const achTabs = document.querySelectorAll('.ach-tab-bar button');
    const achPanels = document.querySelectorAll('[data-ach-panel]');
    achTabs.forEach(tab => {
        tab.addEventListener('click', function () {
            achTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const target = this.getAttribute('data-target');
            achPanels.forEach(p => p.style.display = (p.getAttribute('data-ach-panel') === target) ? 'block' : 'none');
        });
    });

    // Quote deck (custom dot slider, replaces bootstrap carousel)
    const slides = document.querySelectorAll('.quote-slide');
    const dots = document.querySelectorAll('.quote-dots button');
    let quoteIndex = 0;
    function showSlide(i) {
        slides.forEach((s, idx) => s.classList.toggle('active', idx === i));
        dots.forEach((d, idx) => d.classList.toggle('active', idx === i));
    }
    dots.forEach((d, idx) => d.addEventListener('click', () => { quoteIndex = idx; showSlide(quoteIndex); }));
    if (slides.length > 1) {
        setInterval(() => { quoteIndex = (quoteIndex + 1) % slides.length; showSlide(quoteIndex); }, 5000);
    }

    // Lazy skeleton
    document.querySelectorAll('img[loading="lazy"]').forEach(img => {
        img.classList.add('lazy-loading');
        img.addEventListener('load', () => img.classList.remove('lazy-loading'));
    });

    // Flash toast auto-hide
    const toast = document.getElementById('flashToast');
    if (toast) setTimeout(() => toast.style.display = 'none', 4500);

});
