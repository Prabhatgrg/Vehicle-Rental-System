window.addEventListener("DOMContentLoaded", (event) => {
    /*
     * Dropdown menu
     * selecting the element that contains the class dropdown container
     */
    const dropdownContainers = document.querySelectorAll(".dropdown-container");
    if (dropdownContainers[0]) {
        // Looping through the each element
        dropdownContainers.forEach((container) => {
            // selecting the neccessary elements
            const btnDropdown = container.querySelector(".btn-dropdown");
            const dropdownContent = container.querySelector(".dropdown-content");

            // Listening on click event
            btnDropdown.addEventListener("click", () => {
                dropdownContent.classList.toggle("show");
            });
        });
    }

    /*
     * Modal
     * selecting the element that contains the class modal container
     */
    const modalContainers = document.querySelectorAll(".modal-container");
    if (modalContainers[0]) {
        // Looping through the each element
        modalContainers.forEach((modal) => {
            // selecting the neccessary elements
            const btnModal = modal.querySelector(".btn-modal");
            const btnClose = modal.querySelector(".btn-close");
            const modalContent = modal.querySelector(".modal-content");

            // Listening on click event
            btnModal.addEventListener("click", () => {
                modalContent.classList.add("show");
            });
            btnClose.addEventListener("click", () => {
                modalContent.classList.remove("show");
            });
        });
    }

    /*
     * Post Form
     * selecting the element that contains the class post-form
     */
    const postForm = document.querySelector(".post-form");
    if (postForm[0]) {
        postForm.addEventListener("click", (e) => {
            e.preventDefault();

            const isConfirm = confirm("Are you sure ?");
            console.log("confirmation", isConfirm);

            if (isConfirm) {
                postForm.submit();
            }
        });
    }
});
