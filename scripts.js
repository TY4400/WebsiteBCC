document.addEventListener("DOMContentLoaded", function() {
    function revealOnScroll() {
        const reveals = document.querySelectorAll(".category-section");

        for (let i = 0; i < reveals.length; i++) {
            const windowHeight = window.innerHeight;
            const elementTop = reveals[i].getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
                // Adding animation class to individual projects
                const projects = reveals[i].querySelectorAll(".project");
                projects.forEach((project, index) => {
                    setTimeout(() => {
                        project.style.opacity = "1";
                        project.style.transform = "scale(1)";
                    }, index * 100);  // 100ms delay between each project reveal
                });
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", revealOnScroll);
    revealOnScroll(); // Trigger on page load
});
