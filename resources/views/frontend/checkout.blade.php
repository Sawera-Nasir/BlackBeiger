<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="styles.css">
        <style>
            body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
        header {
        background-color: #f8f5f5;
        padding: 20px 0;
        text-align: center;
        color: #100f0f;
    }

    .header-title {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }
    .container {
        width: 60%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section {
        margin-bottom: 20px;
    }

    h2 {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .input-group {
        display: flex;
        justify-content: space-between;
    }

    .input-group .input {
        width: 48%;
    }

    .checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .checkbox input[type="checkbox"] {
        margin-right: 10px;
    }

    .shipping-method, .payment-method {
        margin-bottom: 10px;
    }

    .shipping-method label, .payment-method label {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
    }

    .shipping-method label:hover, .payment-method label:hover {
        background-color: #f1f1f1;
    }

    .price {
        font-weight: bold;
    }
        /* Pay Now Button */
    .pay-now-btn {
        width: 100%;
        padding: 15px;
        background-color: #007bff;
        color: #fff;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    .pay-now-btn:hover {
        background-color: #0056b3;
    }   

            </style>
        
    </head>
<body>
    <header>
        <h1 class="header-title">BLACKBEIGER</h1>
    </header>
    <div class="container">
        <!-- Contact Section -->
        <div class="section">
            <h2>Contact</h2>
            <input type="text" placeholder="Email or mobile phone number" class="input">
            <div class="checkbox">
                <input type="checkbox" id="subscribe" checked>
                <label for="subscribe">Email me with news and offers</label>
            </div>
        </div>

        <!-- Delivery Section -->
        <div class="section">
            <h2>Delivery</h2>
            <div class="input-group">
                <label for="country">Country/Region</label>
                <select id="country" class="input">
                    <option value="Islamabad">Islamabad</option>
                    <option value="Multan">Multan</option>
                    <option value="Rawalpindi">Rawalpindi</option>
                    <option value="Lahore">Lahore</option>
                    <option value="Karachi">Karachi</option>

                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="input-group">
                <input type="text" placeholder="First name (optional)" class="input">
                <input type="text" placeholder="Last name" class="input">
            </div>
            <input type="text" placeholder="Address" class="input">
            <input type="text" placeholder="Apartment, suite, etc. (optional)" class="input">
            <div class="input-group">
                <input type="text" placeholder="City" class="input">
                <input type="text" placeholder="Postal code (optional)" class="input">
            </div>
            <input type="text" placeholder="Phone" class="input">
            <div class="checkbox">
                <input type="checkbox" id="save-info">
                <label for="save-info">Save this information for next time</label>
            </div>
        </div>

        {{-- <!-- Shipping Method Section -->
        <div class="section">
            <h2>Shipping method</h2>
            <div class="shipping-method">
                <label>
                    <input type="radio" name="shipping" checked>
                    <span>Standard</span> <span class="price">Free</span>
                </label>
            </div>
        </div> --}}

        <!-- Payment Section -->
        <div class="section">
            <h2>Payment</h2>
            <div class="payment-method">
                <label>
                    <input type="radio" name="payment" checked>
                    <span>PAYFAST (Pay via Debit/Credit/Wallet/Bank Account)</span>
                </label>
            </div>
            <div class="payment-method">
                <label>
                    <input type="radio" name="payment">
                    <span>Cash on Delivery (COD)</span>
                </label>
            </div>
            <div class="payment-method">
                <label>
                    <input type="radio" name="payment">
                    <span>Bank Deposit</span>
                </label>
            </div>
        </div>

        <!-- Billing Address Section -->
        <div class="section">
            <h2>Billing address</h2>
            <div class="checkbox">
                <input type="checkbox" id="same-address" checked>
                <label for="same-address">Same as shipping address</label>
            </div>
        </div>
        <!-- Pay Now Button -->
        <div class="section">
            <button class="pay-now-btn">Pay Now</button>
        </div>
    </div>
</body>