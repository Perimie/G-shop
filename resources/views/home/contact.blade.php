<section class="contact_section">
  <div class="container px-0">
    <div class="heading_container">
      <h2>
        Contact Us
      </h2>
    </div>
  </div>
  <div class="container container-bg">
    <div class="row">
      <div class="col-lg-7 col-md-6 px-0">
        <div class="map_container">
          <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="300" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-5 px-0">
        <!-- Change the form action to send to a specific route -->
        <form action="{{ route('sendContact') }}" method="POST" id="contactForm">
          @csrf
          <div>
            <input type="text" name="name" id="name" placeholder="Name" required />
          </div>
          <div>
            <input type="email" name="email" id="email" placeholder="Email" required />
          </div>
          <div>
            <input type="text" name="phone" id="phone" placeholder="Phone" required />
          </div>
          <div>
            <textarea style="width: 100%;" name="message" id="message" class="message-box" placeholder="Message" required></textarea>
          </div>
          <div class="d-flex">
            <button type="submit">
              SEND
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<br><br><br>

<script>
  document.getElementById('contactForm').onsubmit = function(event) {
    // Prevent form from submitting the traditional way
    event.preventDefault();

    // Get form data
    var formData = {
      name: document.getElementById('name').value,
      email: document.getElementById('email').value,
      phone: document.getElementById('phone').value,
      message: document.getElementById('message').value
    };

    // JSON encode the form data
    var jsonData = JSON.stringify(formData);

    // Create a hidden input to store the JSON data
    var hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'quotation_data'; // You can change this name to whatever you like
    hiddenInput.value = jsonData;

    // Append the hidden input to the form
    this.appendChild(hiddenInput);

    // Submit the form
    this.submit();
  };
</script>
