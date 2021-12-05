## Industrious - Laravel Code Test

### Introduction

Welcome to the Laravel Code Test!

We're looking to get a better understanding of your Laravel knowledge, and how you would approach something as simple as handling a form, and interaction with an external API.

The frontend styling has been implemented already, we will primarily be looking at the backend functionality, however should you wish to show additional knowledge on the frontend please do so.

### Time Allocation

We're looking for you to spend no longer than 3 hours.  

### Tasks

We have built a simple data capture form using a single Laravel view, with the styling coming from [Tailwind CSS](https://tailwindcss.com).

- [ ] Implement form validation, to ensure all form fields (First Name, Last Name and Postal Code) have been completed.
- [ ] Make a request to the [Google Maps Geocoding API](https://developers.google.com/maps/documentation/geocoding/overview), to retrieve the Latitude & Longitude for the postal code from the user input.  
*N.B. Please use LS12 2DS for testing, as this is what we will be testing your code against.*
- [ ] Save all form fields, along with the latitude and longitude of the postal code to the database, under a `DataCapture` model.
- [ ] On successful submission of the form and once the data has been saved, redirect back with a success message to the same page.

### Considerations

- We will be using PHP 8.1, so you can use any of the functionality in the latest versions of PHP 7 or 8.
- Code should be documented (or self-documented) throughout.
- Ensure code is clean, and any abstractions have been made where applicable. 
- How would you test the solution? Implement if time allows.

### Technical Questions

1. How long did you spend on the coding test?
2. What would you add to your solution given more time?
3. Are you familiar with Tailwind CSS, and comfortable to style up forms such as this on the frontend for systems?
4. How would you test the solution, if this hasn't been implemented already?

### Submission Guidelines

1. Fork the repository
2. Complete the `TECHNICAL_QUESTIONS.md` file within the /documentation folder.
3. Commit the code to a private Github repository, and add the user *christian-thomas*, or add as a public repository if preferred.

---

**Thanks for your time, we look forward to hearing from you!**
