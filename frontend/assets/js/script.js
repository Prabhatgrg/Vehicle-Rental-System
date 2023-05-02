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
        postForm.addEventListener("submit", (e) => {
            e.preventDefault();

            const isConfirm = confirm("Are you sure ?");
            console.log("confirmation", isConfirm);

            if (isConfirm) {
                postForm.submit();
            }
        });
    }

    /*
     * Tab Listing
     * selecting the element that contains the class tabs-container
     */
    const tabsContainer = document.querySelectorAll(".tabs-container");
    if (tabsContainer[0]) {
        // Looping through each tabs container element
        tabsContainer.forEach((tabs) => {
            // selecting the buttons
            const tabButtons = tabs.querySelectorAll(".tab-button");

            // selecting all the tab panes
            const tabPanes = tabs.querySelectorAll(".tab-pane");

            tabButtons.forEach((button) => {
                button.addEventListener("click", (e) => {
                    const currentButton = e.target;
                    const className = "active";

                    // getting the current button's target
                    const targetTabID = currentButton.getAttribute("data-target");
                    const targetedTab = tabs.querySelector(targetTabID);

                    // Removing active class from all the button and tab panes
                    removeAllClass(tabButtons, className);
                    removeAllClass(tabPanes, className);

                    // Adding active class to current button and targeted tab
                    currentButton.classList.add(className);
                    targetedTab.classList.add(className);
                });
            });
        });
    }
});

/*
 * Function to remove class for the given collection of element with given class name
 */
function removeAllClass(objects, className) {
    objects.forEach((current) => {
        current.classList.remove(className);
    });
}
