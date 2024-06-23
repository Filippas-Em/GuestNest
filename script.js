document.addEventListener('DOMContentLoaded', () => {
    const checkDatesForm = document.getElementById('calendar1');
    const bookingForm = document.getElementById('bookingForm');
    const availabilityMessage = document.getElementById('availabilityMessage');
    const availabilityVisibility = document.getElementsByClassName("calendarForm");
    const bookingVisibility = document.getElementsByClassName("booking");
    const backButton = document.getElementById("backButton");
    const price = document.getElementById("priceDisplay");
    const discount = document.getElementById("discountDisplay");
    const total = document.getElementById("totalDisplay");
    

    // check for availability
    if (checkDatesForm) {
        checkDatesForm.addEventListener('submit', function(event) {
            //when the form is submitted prevent it from reloading the page
            event.preventDefault();
            //catch the forms input in a variable
            const formData = new FormData(checkDatesForm);
            //pass the form data to php to check for availability
            fetch('check_availability.php', {
                method: 'POST',
                body: formData
            })
            //retrieve the json file 
            .then(response => response.json())
            .then(data => {
                if (data.status === 'available') {
                    //if it is available dont show any message 
                    availabilityMessage.innerText = "";
                    //calculate the discount
                    let perc = Math.floor(Math.random() * (30 - 10 + 1)) + 10 ;
                    price.innerText =`€ ${data.days * data.listing_price }` ;
                    discount.innerText = `${perc}%`; 
                    total.innerText = `€ ${ data.days * data.listing_price - data.days * data.listing_price * perc/100} ` ;
                    
                    // hide the old form
                    Array.from(availabilityVisibility).forEach(element => {
                        element.classList.add("hidden");
                    });

                    bookingForm.classList.remove('hidden');

                    checkDatesForm.classList.add('hidden');
                    //show the new booking form
                    Array.from(bookingVisibility).forEach(element => {
                        element.classList.remove("hidden");
                    });
                    
                    

                    document.getElementById('start_date').value = formData.get('checkin');
                    document.getElementById('end_date').value = formData.get('checkout');
                } else {
                    availabilityMessage.innerText = "Not available.";
                    bookingForm.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                availabilityMessage.innerText = "An error occurred while checking availability.";
            });
        });
    } else {
        console.error('Form not found: calendar1');
    }

    if (backButton) {
        backButton.addEventListener('click', function(event) {
            event.preventDefault();
            //functionality for the back button in case the user wants to select new dates
            Array.from(availabilityVisibility).forEach(element => {
                element.classList.remove("hidden");
            });

            bookingForm.classList.add('hidden');

            checkDatesForm.classList.remove('hidden');

            Array.from(bookingVisibility).forEach(element => {
                element.classList.add("hidden");
            });

            availabilityMessage.innerText = "";
        });
    } else {
        console.error('Button not found: backButton');
    }
});
