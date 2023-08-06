jQuery(document).ready(function ($) {
  let currentStep = 1;
  let ratingValue = null; // Variable to store the selected rating

  // Add event listener to the feedback button
  $('.feedstack-toggle-button').on('click', function () {
    // Toggle the visibility of the feedback form
    $('.feedstack-feedback-form').toggleClass('show-feedback-form');
    showStep(currentStep);
  });

  // Move to the next step
  function nextStep() {
    currentStep++;
    showStep(currentStep);
  }

  // Move to the previous step
  function prevStep() {
    currentStep--;
    showStep(currentStep);
  }

  // Show the specified step and hide others
  function showStep(step) {
    $('.step').removeClass('active');
    $(`.step[data-step="${step}"]`).addClass('active');

    // Update Step 2 heading based on selected rating
    if (step === 2) {
      let headingText = '';
      switch (ratingValue) {
        case '1':
          headingText = 'We\'re sorry to hear that. Please provide more details:';
          break;
        case '2':
          headingText = 'We appreciate your feedback. Please tell us more:';
          break;
        case '3':
          headingText = 'Thank you for your feedback. Please share further:';
          break;
        case '4':
          headingText = 'We\'re glad you had a good experience. Please share:';
          break;
        case '5':
          headingText = 'We\'re thrilled to hear that. Please let us know more:';
          break;
        default:
          headingText = 'Please provide your feedback:';
      }

      $('.step[data-step="2"] p').text(headingText);
    }
  }

  // When the form is submitted:
  // Make an AJAX request to the external API
  $('#feedbackForm').on('submit', function (event) {
    event.preventDefault();
    const formData = $(this).serializeArray(); // Serialize the form data
    formData.push({ name: 'rating', value: ratingValue }); // Add the rating value to the form data

    $.ajax({
      url: 'https://your-external-api-url.com/submit-feedback',
      method: 'POST',
      data: formData,
      success: function (response) {
        // Handle the API response and display the result to the form submitter
        alert('Thank you for your feedback: ' + response.message);
        // Hide the feedback form after successful submission
        $('.feedstack-feedback-form').removeClass('show-feedback-form');
        currentStep = 1; // Reset the current step to the first step
        ratingValue = null; // Reset the selected rating
        showStep(currentStep); // Show the first step again
      },
      error: function (xhr, status, error) {
        // Handle error response from the API
        alert('Feedback submission failed. Please try again later.' + status);
      },
    });
  });

  // Add event listener to the Next button
  $('.nextBtn').on('click', function () {
    // Capture the rating value from Step 1
    if (currentStep === 1) {
      const selectedRating = $('input[name="rating"]:checked').val();

      console.log(selectedRating);
      if (selectedRating) {
        ratingValue = selectedRating;
      } else {
        alert('Please select a rating.');
        return;
      }
    }
    nextStep();
  });

  // Add event listener to the Previous button
  $('.prevBtn').on('click', function () {
    prevStep();
  });

  // Add event listener to the star buttons (Step 1)
  $('.star-btn').on('click', function () {
    ratingValue = $(this).prevAll('input[name="rating"]').val();
    console.log('Selected rating: ' + ratingValue);
  });
});
