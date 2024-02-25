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
  if (postForm) {
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

  // Modal Form Validation
  function validatePostForm(postForm) {
    let errorMessage = "";
    let isValidate = true;

    const postTitle = postForm.querySelector("#postTitle").value;
    const postImageUpload = [
      ...postForm.querySelector("#postImageUpload").files,
    ];
    const postOwnership = [...postForm.querySelector("#postOwnership").files];
    const postLocation = postForm.querySelector("#postLocation").value;
    const postDescription = postForm.querySelector("#postDescription").value;
    const postMileage = parseInt(postForm.querySelector("#postMileage").value);
    const postPrice = parseInt(postForm.querySelector("#postPrice").value);
    const postPriceBase = postForm.querySelector("#postPriceBase").value;

    let regex = new RegExp(
      /[^\s]+(.*?).(jpg|jpeg|png|JPG|JPEG|PNG|webp|WEBP)$/
    );
    if (postTitle < 5) {
      errorMessage += "Post title must be 5 characters\n";
      isValidate = false;
    }

    if (postImageUpload[0]) {
      const limit = 4;
      console.log(postImageUpload);
      if (postImageUpload.length > limit) {
        errorMessage += `Please upload post image less then ${limit}\n`;
        isValidate = false;
      }
      postImageUpload.forEach((file, index) => {
        if (regex.test(file.name) == false) {
          errorMessage += `Please upload valid post image at ${
            index + 1
          } position\n`;
          isValidate = false;
        }
      });
    } else {
      errorMessage += "Please upload post image\n";
      isValidate = false;
    }
    if (postOwnership[0]) {
      const limit = 4;
      console.log(postOwnership);
      if (postOwnership.length > limit) {
        errorMessage += `Please upload ownership image less then ${limit}\n`;
        isValidate = false;
      }
      postOwnership.forEach((file, index) => {
        if (regex.test(file.name) == false) {
          errorMessage += `Please upload valid ownership image at ${
            index + 1
          } position\n`;
          isValidate = false;
        }
      });
    } else {
      errorMessage += "Please upload ownership image\n";
      isValidate = false;
    }

    if (postLocation < 5) {
      errorMessage += "Post location must be 5 characters\n";
      isValidate = false;
    }
    if (postDescription < 20) {
      errorMessage += "Post description must be 20 characters long\n";
      isValidate = false;
    }
    if (isNaN(postMileage)) {
      errorMessage += "Please enter valid mileage\n";
      isValidate = false;
    }
    if (postPrice < 1000) {
      errorMessage += "Minimum rent price should start with Rs. 1000\n";
      isValidate = false;
    }
    if (postPriceBase == "") {
      errorMessage += "Please select the price base\n";
      isValidate = false;
    }
    if (!isValidate) alert(errorMessage);

    return isValidate;
  }

  /**
   * Signup Form Validation
   */
  const signupForm = document.querySelector(".signup-form");
  if (signupForm) {
    signupForm.addEventListener("submit", (e) => {
      e.preventDefault();

      const isValid = validateSignupForm(signupForm);

      if (!isValid) {
        return;
      }

      const isConfirm = confirm("Are you sure ?");
      if (isConfirm) {
        signupForm.submit();
      }
    });
  }

  function validateSignupForm(signupForm) {
    let errorMessage = "";
    let isValid = true;

    const fullName = signupForm.querySelector("#signupfullName").value;
    const userName = signupForm.querySelector("#signupUsername").value;
    const phoneNumber = signupForm.querySelector("#signupPhone").value;

    let fullNamePattern = /^[A-Za-z\s-]+$/;
    let numberPattern = /^(98|97|96|95|94|93|92|91|90)[0-9]{8}$/;

    if (!fullNamePattern.test(fullName)) {
      errorMessage += "Name must be in string \n";
      isValid = false;
    }
    if (!numberPattern.test(phoneNumber)) {
      errorMessage += "Invalid Phone Number \n";
      isValid = false;
    }
    if (!fullNamePattern.test(userName)){
        errorMessage += "Invalid Username \n";
        isValid = false;
    }
    if (!isValid) {
      alert(errorMessage);
    }
    return isValid;
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
        const replyUserName =
          currentParent.querySelector(".user-name").innerText;
        const replyCommentId = currentParent.getAttribute("data-comment-id");

        // Adding active class if replying user element has not contains active class
        if (!replyingToElem.classList.contains(replyActiveClass)) {
          replyingToElem.classList.add(replyActiveClass);
        }

        // setting the value
        replyToInput.value = replyCommentId;
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
      const commentField = commentForm.querySelector(
        '[name="comment-field"]'
      ).value;
      if (commentField == "") {
        alert("Comment cannot be posted empty. Please enter a comment.");
        return false;
      }

      commentForm.submit();
    });
  }

  /*
   * User review form
   */
  const userReviewForm = document.querySelector(".user-review-form");
  if (userReviewForm) {
    const starFilledContainer = userReviewForm.querySelector(".star-filled");
    const ratingBtns = userReviewForm.querySelectorAll(".star-outline button");
    const userRating = userReviewForm.querySelector('[name="userRating"]');

    ratingBtns.forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const rateValue = parseInt(e.currentTarget.value);
        starFilledContainer.style.width = rateValue * 20 + "%";
        userRating.value = rateValue;
      });
    });

    userReviewForm.addEventListener("submit", (e) => {
      let isValidate = true;
      let errorMessage = "";
      const userRating = userReviewForm.querySelector(
        '[name="userRating"]'
      ).value;
      const userReview = userReviewForm.querySelector(
        '[name="userReview"]'
      ).value;
      if (userRating == 0 || userRating == "") {
        errorMessage += "Please rate the user\n";
        isValidate = false;
      }

      if (userReview == "") {
        errorMessage += "Review cannot be empty";
        isValidate = false;
      }
      if (!isValidate) {
        alert(errorMessage);
        e.preventDefault();
      }
    });
  }

  const chatForm = document.querySelector(".chat-form");
  if (chatForm) {
    chatForm.addEventListener("submit", (e) => {
      const chatField = chatForm.querySelector(
        '[name="chatMessageField"]'
      ).value;
      if (chatField == "") {
        alert("Message field cannot be empty. Please enter a message.");
        e.preventDefault();
        return false;
      }
    });
  }

  /**
   * Booking Validation
   */
  function updatePrice(startDate, endDate) {
    if (startDate == "") alert("Please enter a start date");
    if (endDate == "") alert("Please enter a End date");

    let dateGap = 0;
    const bookingPrice = Number(
      document.querySelector('[name="booking_price"]').value
    );
    const priceContainer = document.querySelector("#bookingPrice");
    const result = document.querySelector(".result");

    if (startDate != "" && endDate != "") {
      const gapTime = endDate.getTime() - startDate.getTime();
      dateGap = gapTime / (1000 * 3600 * 24);
    }

    const price = dateGap * bookingPrice + bookingPrice;
    result.textContent = `Total Price: Rs. ${price}/-`;
    priceContainer.value = `Rs. ${price}/-`;
  }

  const bookForm = document.querySelector(".book-form");
  if (bookForm) {
    const bookingStart = bookForm.querySelector("#bookStartDate");
    const bookingEnd = bookForm.querySelector("#bookEndDate");
    let startDate = "",
      endDate = "";

    bookingStart.addEventListener("input", (e) => {
      startDate = new Date(e.target.value);
      updatePrice(startDate, endDate);
    });
    bookingEnd.addEventListener("input", (e) => {
      endDate = new Date(e.target.value);
      updatePrice(startDate, endDate);
    });

    bookForm.addEventListener("submit", (e) => {
      const currentDate = new Date().getTime();
      let isValidate = true;
      let errorMessage = "";
      const startDateValue = bookForm.querySelector("#bookStartDate").value;
      const endDateValue = bookForm.querySelector("#bookEndDate").value;

      if (startDateValue == "") {
        errorMessage += "Please enter start date\n";
        isValidate = false;
      } else {
        const bookRentStartDate = new Date(startDateValue).getTime();
        if (bookRentStartDate < currentDate) {
          errorMessage += "Please enter valid start date\n";
          isValidate = false;
        }
      }

      if (endDateValue == "") {
        errorMessage += "Please enter end date\n";
        isValidate = false;
      } else {
        const bookRentEndDate = new Date(endDateValue).getTime();
        const bookRentStartDate = new Date(startDateValue).getTime();
        if (bookRentStartDate > bookRentEndDate) {
          errorMessage +=
            "Vehicle rent finish date should be greater then start date\n";
          isValidate = false;
        }
      }

      if (!isValidate) {
        e.preventDefault();
        alert(errorMessage);
      }
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
