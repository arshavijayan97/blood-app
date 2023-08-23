
    document.addEventListener("DOMContentLoaded", function () {

        const form = document.getElementById("myForm");

        const validator = new MessageValidator();

        // Define validation rules
        validator.addRule("donor_name", "required", "Please enter donor's name.");
        validator.addRule("blood_group", "required", "Please enter the blood group.");
        validator.addRule("donation_date", "required", "Please select a valid donation date.");
        validator.addRule("quantity_ml", "required", "Please enter the quantity.");
        validator.addRule("quantity_ml", "numeric", "Only numeric values are allowed.");

        // Set custom error messages for each rule
        validator.setMessage("required", "{field} is required.");
        validator.setMessage("numeric", "{field} must be a valid numeric value.");

        // Display error messages on form load (without submitting the form)
        validator.showErrorsOnLoad();

        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent form submission until validation is complete

            // Validate the form fields
            const errors = validator.validateForm(form);

            if (errors.length > 0) {
                // If there are validation errors, display them next to the corresponding fields
                validator.showErrors(errors);
            } else {
                // If the form passes validation, you can submit the form here
                // For simplicity, we'll just log a success message
                console.log("Form submitted successfully!");
                form.submit(); // Uncomment this line to submit the form to the server
            }
        });
    });
