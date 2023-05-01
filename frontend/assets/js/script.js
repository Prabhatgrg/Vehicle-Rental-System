window.addEventListener("DOMContentLoaded", (event) => {
    const dropdownContainers = document.querySelectorAll(".dropdown-container");
    if (dropdownContainers[0]) {
        dropdownContainers.forEach((container) => {
            const btnDropdown = container.querySelector(".btn-dropdown");
            const dropdownContent = container.querySelector(".dropdown-content");

            btnDropdown.addEventListener("click", () => {
                console.log("click");
                dropdownContent.classList.toggle("show");
            });
        });
    }
});
