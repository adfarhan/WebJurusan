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
document.addEventListener("DOMContentLoaded", () => {
    const prospek = document.querySelector(".prospek");
    const indicators = document.querySelector(".indicators");
    const cards = document.querySelectorAll(".prospek div");
    const leftButton = document.querySelector(".nav-button.left");
    const rightButton = document.querySelector(".nav-button.right");

    let currentIndex = 0;
    let cardWidth = calculateCardWidth();

    // Fungsi untuk menghitung lebar kartu
    function calculateCardWidth() {
        return window.innerWidth >= 768 ? prospek.offsetWidth / 3 : prospek.offsetWidth; // Desktop: 3 kartu, Mobile: 1 kartu
    }

    // Fungsi untuk menghitung jumlah slide total
    function calculateTotalSlides() {
        const cardsPerSlide = window.innerWidth >= 768 ? 3 : 1; // Desktop: 3 kartu, Mobile: 1 kartu
        return Math.ceil(cards.length / cardsPerSlide);
    }

    // Fungsi untuk memperbarui indikator (hanya di desktop)
    function updateIndicators() {
        if (window.innerWidth >= 768) {
            indicators.innerHTML = "";
            const totalSlides = calculateTotalSlides();

            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement("span");
                dot.classList.add("indicator-dot");
                if (i === currentIndex) dot.classList.add("active");
                dot.addEventListener("click", () => moveToSlide(i));
                indicators.appendChild(dot);
            }
        } else {
            indicators.innerHTML = ""; // Hapus indikator di mobile
        }
    }

    // Fungsi untuk berpindah ke slide tertentu
    function moveToSlide(index) {
        currentIndex = index;
        const cardsPerSlide = window.innerWidth >= 768 ? 3 : 1; // Desktop: 3 kartu, Mobile: 1 kartu
        const translateValue = -currentIndex * cardWidth * cardsPerSlide;
        prospek.style.transform = `translateX(${translateValue}px)`;
        prospek.style.transition = "transform 0.3s ease-in-out";

        if (window.innerWidth >= 768) {
            document.querySelectorAll(".indicator-dot").forEach((dot, i) => {
                dot.classList.toggle("active", i === currentIndex);
            });
        }
    }

    // Event untuk tombol kiri
    leftButton.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            moveToSlide(currentIndex);
        }
    });

    // Event untuk tombol kanan
    rightButton.addEventListener("click", () => {
        if (currentIndex < calculateTotalSlides() - 1) {
            currentIndex++;
            moveToSlide(currentIndex);
        }
    });

    // Event saat layar diresize
    window.addEventListener("resize", () => {
        cardWidth = calculateCardWidth();
        updateIndicators();
        moveToSlide(currentIndex);
    });

    // Inisialisasi
    cardWidth = calculateCardWidth();
    updateIndicators();
    moveToSlide(currentIndex);
});








