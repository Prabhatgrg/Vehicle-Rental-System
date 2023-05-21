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

            const isValidate = validatePostForm(postForm);

            if (!isValidate) {
                return;
            }

            const isConfirm = confirm("Are you sure ?");

            if (isConfirm) {
                postForm.submit();
            }
        });
    }

    function validatePostForm(postForm) {
        let isValidate = true;
        const currentYear = new Date().getFullYear();

        const postTitle = postForm.querySelector("#postTitle").value;
        const postImageUpload = [...postForm.querySelector("#postImageUpload").files];
        const postLocation = postForm.querySelector("#postLocation").value;
        const postDescription = postForm.querySelector("#postDescription").value;
        const postColour = postForm.querySelector("#postColour").value;
        const postMileage = parseInt(postForm.querySelector("#postMileage").value);
        const postPrice = parseInt(postForm.querySelector("#postPrice").value);
        const postNegotiable = postForm.querySelector("#postNegotiable").value;
        const postRentStartDate = new Date(postForm.querySelector("#postRentStartDate").value);
        const postRentEndDate = new Date(postForm.querySelector("#postRentEndDate").value);

        let regex = new RegExp(/[^\s]+(.*?).(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/);
        if (postTitle < 5) {
            alert("Post title must be 5 characters");
            isValidate = false;
        }

        if (postImageUpload[0]) {
            postImageUpload.forEach((file, index) => {
                if (regex.test(file.name) == false) {
                    alert(`Please upload valid image at ${index + 1} position`);
                }
            });
        } else {
            alert("Please upload image");
        }

        if (postLocation < 5) {
            alert("Post location must be 5 characters");
            isValidate = false;
        }
        if (postDescription < 20) {
            alert("Post description must be 20 characters long");
            isValidate = false;
        }
        if (isNaN(postMileage)) {
            alert("Please enter valid mileage");
            isValidate = false;
        }
        if (postPrice < 1000) {
            alert("Minimum rent price should start with Rs. 1000");
            isValidate = false;
        }
        if (postNegotiable == "") {
            alert("Please select the price is negotiable or not");
            isValidate = false;
        }
        if (postRentStartDate.getFullYear() < currentYear) {
            alert("Please enter valid start date");
            isValidate = false;
        }
        if (postRentStartDate.getTime() > postRentEndDate.getTime()) {
            alert("Vehicle rent finish date should be greater then start date");
            isValidate = false;
        }
        return isValidate;
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

    /*
     * Comment
     * selecting the element that contains the id comments
     */
    const commentContainer = document.querySelector("#comments");
    if (commentContainer) {
        const replyActiveClass = "active";
        const replyBtns = commentContainer.querySelectorAll(".btn-reply");
        const commentForm = commentContainer.querySelector("#comment-form");
        const replyToInput = commentForm.querySelector("#reply-to");
        const commentField = commentForm.querySelector("#comment-field");
        const replyingToElem = commentContainer.querySelector(".replying-to");
        const replyUserContainer = replyingToElem.querySelector(".replying-user");
        const cancelReplyBtn = replyingToElem.querySelector(".btn-cancel-reply");

        // listening to each button on click event
        replyBtns.forEach((button) => {
            button.addEventListener("click", (e) => {
                const currentButton = e.target;
                const currentParent = currentButton.parentElement.parentElement;
                const replyUserName = currentParent.querySelector(".user-name").innerText;

                // Adding active class if replying user element has not contains active class
                if (!replyingToElem.classList.contains(replyActiveClass)) {
                    replyingToElem.classList.add(replyActiveClass);
                }

                // setting the value
                replyToInput.value = replyUserName;
                replyUserContainer.innerText = replyUserName;
                commentField.setAttribute("placeholder", `Reply to ${replyUserName}`);
            });
        });

        // Listening on click event to cancel the comment
        cancelReplyBtn.addEventListener("click", () => {
            // Removing active class if replying user element has not contains active class
            if (replyingToElem.classList.contains(replyActiveClass)) {
                replyingToElem.classList.remove(replyActiveClass);
            }

            // Reseting the values for cancelation
            replyToInput.value = "";
            replyUserContainer.innerText = "";
            commentField.setAttribute("placeholder", `Comment`);
        });

        // Listening on submit event to submit comment
        commentForm.addEventListener("submit", (e) => {
            e.preventDefault();

            alert("Your comment has been submitted");

            commentForm.submit();
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
