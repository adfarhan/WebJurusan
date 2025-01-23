document.addEventListener("DOMContentLoaded", () => {
    // Animasi elemen saat scroll
    const animatedElements = document.querySelectorAll(".animated-element");

    const checkVisibility = () => {
        const windowHeight = window.innerHeight;

        animatedElements.forEach((element) => {
            const elementTop = element.getBoundingClientRect().top;

            // Tambahkan kelas animasi jika elemen terlihat
            if (elementTop < windowHeight - 150) {
                element.classList.add("fadeIn");
            }
        });
    };

    // Tambahkan event listener untuk scroll
    window.addEventListener("scroll", checkVisibility);
    // Jalankan pengecekan awal saat halaman dimuat
    checkVisibility();

    // Menampilkan form pada klik tombol
    const showFormBtn = document.getElementById("showFormBtn");
    if (showFormBtn) {
        showFormBtn.addEventListener("click", () => {
            const card = document.querySelector(".testimoni-card");
            if (card) {
                card.classList.add("show"); // Menampilkan card
            }
        });
    }

    // Toggle elemen detail pada klik kartu
    const cards = document.querySelectorAll(".card");
    cards.forEach((card) => {
        card.addEventListener("click", () => {
            const targetId = card.getAttribute("data-target");
            const targetElement = document.getElementById(targetId);

            // Tutup semua elemen detail yang lain
            document.querySelectorAll(".detail").forEach((detail) => {
                if (detail !== targetElement) {
                    detail.style.display = "none";
                }
            });

            // Toggle tampilan elemen target
            if (targetElement) {
                targetElement.style.display =
                    targetElement.style.display === "block" ? "none" : "block";
            }
        });
    });
});

// Carousel utama
let currentSlide = 0;

function updateSlideClasses(index) {
    const carouselItems = document.querySelectorAll('.carousel-item');
    const dots = document.querySelectorAll('.dot');

    carouselItems.forEach((item, idx) => {
        item.classList.remove('active', 'prev', 'next');
        dots[idx].classList.remove('active');
        if (idx === index) {
            item.classList.add('active');
            dots[idx].classList.add('active');
        } else if (idx === (index - 1 + carouselItems.length) % carouselItems.length) {
            item.classList.add('prev');
        } else if (idx === (index + 1) % carouselItems.length) {
            item.classList.add('next');
        }
    });
}

function nextSlide() {
    const carouselItems = document.querySelectorAll('.carousel-item');
    currentSlide = (currentSlide + 1) % carouselItems.length;
    updateSlideClasses(currentSlide);
}

function prevSlide() {
    const carouselItems = document.querySelectorAll('.carousel-item');
    currentSlide = (currentSlide - 1 + carouselItems.length) % carouselItems.length;
    updateSlideClasses(currentSlide);
}

function goToSlide(index) {
    currentSlide = index;
    updateSlideClasses(currentSlide);
}

document.addEventListener('DOMContentLoaded', () => {
    updateSlideClasses(currentSlide);

    // Event listeners untuk tombol
    const prevButton = document.querySelector('.carousel-button.prev');
    const nextButton = document.querySelector('.carousel-button.next');

    if (prevButton && nextButton) {
        prevButton.addEventListener('click', prevSlide);
        nextButton.addEventListener('click', nextSlide);
    } else {
        console.error('Tombol carousel tidak ditemukan.');
    }

    // Event listeners untuk dot
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });
});

// Carousel prospek
document.addEventListener('DOMContentLoaded', () => {
    const prospek = document.querySelector('.prospek');
    const indicators = document.querySelector('.indicators');
    const cards = document.querySelectorAll('.prospek div');
    let currentIndex = 0;
    let isDragging = false;
    let startX = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;

    // Fungsi untuk menghitung lebar kartu yang terlihat
    const calculateCardWidth = () => {
        const visibleCards = window.innerWidth >= 768 ? 3 : 1;
        return prospek.offsetWidth / visibleCards;
    };

    // Fungsi untuk menghitung jumlah slide total
    const calculateTotalSlides = () => {
        const visibleCards = window.innerWidth >= 768 ? 3 : 1;
        return Math.ceil(cards.length / visibleCards);
    };

    // Fungsi untuk memperbarui indikator
    const updateIndicators = () => {
        indicators.innerHTML = '';
        const totalSlides = calculateTotalSlides();
        Array.from({ length: totalSlides }).forEach((_, index) => {
            const indicator = document.createElement('span');
            if (index === currentIndex) indicator.classList.add('active');
            indicator.addEventListener('click', () => moveToSlide(index));
            indicators.appendChild(indicator);
        });
    };

    // Fungsi untuk berpindah ke slide tertentu
    const moveToSlide = (index) => {
        currentIndex = index;
        const visibleCards = window.innerWidth >= 768 ? 3 : 1;
        const translateValue = -currentIndex * cardWidth * visibleCards;
        prospek.style.transform = `translateX(${translateValue}px)`;
        prospek.style.transition = 'transform 0.3s ease-in-out';

        // Update indikator
        document.querySelectorAll('.indicators span').forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    };

    // Fungsi drag
    const startDrag = (event) => {
        isDragging = true;
        startX = getPositionX(event);
        prospek.style.transition = 'none';
    };

    const drag = (event) => {
        if (!isDragging) return;
        const currentX = getPositionX(event);
        const deltaX = currentX - startX;
        currentTranslate = prevTranslate + deltaX;
        prospek.style.transform = `translateX(${currentTranslate}px)`;
    };

    const endDrag = () => {
        isDragging = false;
        const movedBy = currentTranslate - prevTranslate;

        const visibleCards = window.innerWidth >= 768 ? 3 : 1;
        const threshold = cardWidth * visibleCards * 0.25;

        if (movedBy < -threshold && currentIndex < calculateTotalSlides() - 1) currentIndex++;
        if (movedBy > threshold && currentIndex > 0) currentIndex--;

        moveToSlide(currentIndex);
        prevTranslate = -currentIndex * cardWidth * visibleCards;
    };

    const getPositionX = (event) => {
        return event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
    };

    // Event listeners untuk drag dan resize
    prospek.addEventListener('mousedown', startDrag);
    prospek.addEventListener('mousemove', drag);
    prospek.addEventListener('mouseup', endDrag);
    prospek.addEventListener('mouseleave', endDrag);

    prospek.addEventListener('touchstart', startDrag);
    prospek.addEventListener('touchmove', drag);
    prospek.addEventListener('touchend', endDrag);

    window.addEventListener('resize', () => {
        cardWidth = calculateCardWidth();
        updateIndicators();
        moveToSlide(currentIndex);
    });

    // Inisialisasi
    let cardWidth = calculateCardWidth();
    updateIndicators();
    moveToSlide(currentIndex);
});


