// Jika ingin animasi muncul saat scroll
document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animated-element");

    const checkVisibility = () => {
        const windowHeight = window.innerHeight;
        elements.forEach((element) => {
            const elementTop = element.getBoundingClientRect().top;
            if (elementTop < windowHeight - 150) {
                element.classList.add("fadeIn");
            }
        });
    };

    window.addEventListener("scroll", checkVisibility);
    checkVisibility(); // Untuk memastikan animasi langsung terjadi saat halaman pertama kali dimuat
});
