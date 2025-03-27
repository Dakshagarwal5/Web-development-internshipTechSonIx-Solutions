(function(){
    emailjs.init("uwFZ6iOLAKVUutUiZ");  // Your EmailJS Public Key
})();

document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    var templateParams = {
        name: this.name.value,
        email: this.email.value,
        subject: this.subject.value,
        message: this.message.value
    };

    emailjs.send('service_x7yv0k9', 'template_c1hp8oc', templateParams)  // Service ID and Template ID
        .then(function(response) {
            alert('Message Sent Successfully!');
            document.getElementById('contact-form').reset(); // Reset form fields
        }, function(error) {
            alert('Failed to Send Message. Please try again.');
        });
});
