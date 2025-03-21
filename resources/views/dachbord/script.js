// Set current year in footer
document.getElementById('currentYear').textContent = new Date().getFullYear();

// Mobile menu toggle
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
            navLinks.classList.remove('active');
        }
    });

    // Close menu when clicking on a link
    const links = navLinks.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
        });
    });
}

// Product hover effect enhancement
const productCards = document.querySelectorAll('.product-card');
productCards.forEach(card => {
    const overlay = card.querySelector('.product-overlay');
    
    if (overlay) {
        // For touch devices
        card.addEventListener('touchstart', () => {
            overlay.style.opacity = '1';
        }, { passive: true });
        
        card.addEventListener('touchend', () => {
            setTimeout(() => {
                overlay.style.opacity = '0';
            }, 500);
        }, { passive: true });
    }
});

// Set current year in footer
document.getElementById('currentYear').textContent = new Date().getFullYear();

// Mobile menu toggle
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
            navLinks.classList.remove('active');
        }
    });

    // Close menu when clicking on a link
    const links = navLinks.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
        });
    });
}

// Product hover effect enhancement
const productCards = document.querySelectorAll('.product-card');
productCards.forEach(card => {
    const overlay = card.querySelector('.product-overlay');
    
    if (overlay) {
        // For touch devices
        card.addEventListener('touchstart', () => {
            overlay.style.opacity = '1';
        }, { passive: true });
        
        card.addEventListener('touchend', () => {
            setTimeout(() => {
                overlay.style.opacity = '0';
            }, 500);
        }, { passive: true });
    }
});

// Hero Slider Functionality
const sliderTrack = document.getElementById('sliderTrack');
const sliderDots = document.getElementById('sliderDots');
const prevSlide = document.getElementById('prevSlide');
const nextSlide = document.getElementById('nextSlide');

if (sliderTrack && sliderDots && prevSlide && nextSlide) {
    const slides = sliderTrack.querySelectorAll('.slide');
    const dots = sliderDots.querySelectorAll('.dot');
    let currentSlide = 0;
    let slideInterval;
    
    // Function to go to a specific slide
    function goToSlide(index) {
        if (index < 0) {
            index = slides.length - 1;
        } else if (index >= slides.length) {
            index = 0;
        }
        
        sliderTrack.style.transform = `translateX(-${index * 100}%)`;
        
        // Update active dot
        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
        
        currentSlide = index;
    }
    
    // Event listeners for controls
    prevSlide.addEventListener('click', () => {
        goToSlide(currentSlide - 1);
        resetInterval();
    });
    
    nextSlide.addEventListener('click', () => {
        goToSlide(currentSlide + 1);
        resetInterval();
    });
    
    // Dot navigation
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            const index = parseInt(dot.getAttribute('data-index'));
            goToSlide(index);
            resetInterval();
        });
    });
    
    // Auto slide
    function startInterval() {
        slideInterval = setInterval(() => {
            goToSlide(currentSlide + 1);
        }, 5000);
    }
    
    function resetInterval() {
        clearInterval(slideInterval);
        startInterval();
    }
    
    // Initialize slider
    startInterval();
}

// Product Showcase Slider
const showcaseSliderTrack = document.getElementById('showcaseSliderTrack');
const prevShowcase = document.getElementById('prevShowcase');
const nextShowcase = document.getElementById('nextShowcase');

if (showcaseSliderTrack && prevShowcase && nextShowcase) {
    const slides = showcaseSliderTrack.querySelectorAll('.showcase-slide');
    let position = 0;
    let slidesToShow = 4;
    
    // Adjust slidesToShow based on screen width
    function updateSlidesToShow() {
        if (window.innerWidth < 576) {
            slidesToShow = 1;
        } else if (window.innerWidth < 768) {
            slidesToShow = 2;
        } else if (window.innerWidth < 992) {
            slidesToShow = 3;
        } else {
            slidesToShow = 4;
        }
    }
    
    // Update on resize
    window.addEventListener('resize', () => {
        updateSlidesToShow();
        updateSliderPosition();
    });
    
    // Initialize
    updateSlidesToShow();
    
    // Function to update slider position
    function updateSliderPosition() {
        const slideWidth = 100 / slidesToShow;
        const maxPosition = slides.length - slidesToShow;
        
        // Ensure position is within bounds
        if (position < 0) {
            position = 0;
        } else if (position > maxPosition) {
            position = maxPosition;
        }
        
        // Update slider position
        showcaseSliderTrack.style.transform = `translateX(-${position * slideWidth}%)`;
        
        // Update button states
        prevShowcase.disabled = position === 0;
        nextShowcase.disabled = position >= maxPosition;
        
        // Visual indication of disabled state
        if (position === 0) {
            prevShowcase.style.opacity = '0.5';
            prevShowcase.style.cursor = 'not-allowed';
        } else {
            prevShowcase.style.opacity = '1';
            prevShowcase.style.cursor = 'pointer';
        }
        
        if (position >= maxPosition) {
            nextShowcase.style.opacity = '0.5';
            nextShowcase.style.cursor = 'not-allowed';
        } else {
            nextShowcase.style.opacity = '1';
            nextShowcase.style.cursor = 'pointer';
        }
    }
    
    // Event listeners for controls
    prevShowcase.addEventListener('click', () => {
        position--;
        updateSliderPosition();
    });
    
    nextShowcase.addEventListener('click', () => {
        position++;
        updateSliderPosition();
    });
    
    // Initialize slider position
    updateSliderPosition();
}