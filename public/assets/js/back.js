document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.querySelector(".sidebar");
    const adminText = document.getElementById("adminText");
    const footer = document.getElementById("footer");
    const content = document.getElementById("content"); // Tambahkan elemen konten

    toggleBtn.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");

        // Sembunyikan teks Admin
        if (sidebar.classList.contains("collapsed")) {
            adminText.style.display = "none";
            footer.classList.add("collapsed");
            content.classList.add("collapsed"); // Tambahkan logika ke konten
        } else {
            adminText.style.display = "block";
            footer.classList.remove("collapsed");
            content.classList.remove("collapsed"); // Kembalikan ukuran konten
        }
    });
});


