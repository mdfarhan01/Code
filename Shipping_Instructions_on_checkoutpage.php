add_action('woocommerce_review_order_before_submit', 'add_custom_content_before_place_order', 10);
function add_custom_content_before_place_order() {
    echo '
	
<div style="padding:0px;">
    <style>
        .heading{
            font-family: nt-family: var(--e-global-typography-primary-font-family); 
            margin: 0px; 
            font-size: 17px !important; 
            font-weight:700; 
            font-weight: 300; 
			font-height:28px;
        }
        .para{
            padding: 20px 15px;
            font-size: 14px; 
            font-weight: 300;
            margin-bottom: 20px;
            background-color: #fff;
            color: #000;
            letter-spacing: 1px;
            border-radius: 4px;
        }
    </style>
        <h1 class="heading">Shipping Instructions</h1>
		
		<!-- Write your comments here -->
        <p class="para">
		
		1️⃣ Delivery Address: Please provide a complete and accurate shipping address, including any apartment, unit, or suite numbers.<br><br>
		2️⃣ Special Requests: If you have any specific delivery instructions (e.g., "Leave at the back door" or "Do not ring the doorbell"), please mention them during checkout.<br><br>
		3️⃣ Processing Time: Orders are typically processed within 1-2 business days. You will receive a confirmation email once your order is shipped.<br><br>
		4️⃣ Contact Us: For any questions or changes to your shipping details, contact us at <a href="mailto:contact@info.com">contact@info.com</a> or call <a href="tel:+555000555">1 (555) 000 555</a>.
		
		</p>
</div>
	';
}

 
