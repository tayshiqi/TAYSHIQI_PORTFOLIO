
//index video
function changeVid(x)
{
	mainvid.src = x.src;
}

//faqs
document.addEventListener("DOMContentLoaded", () =>
{
	const faqs = document.querySelectorAll(".faq");

	faqs.forEach(faq =>
	{
		faq.querySelector(".faq-question").addEventListener("click", () =>
		{
		// Toggle "active" class
		faq.classList.toggle("active");

		// Change symbol + or −
		const symbol = faq.querySelector("span");
		symbol.textContent = faq.classList.contains("active") ? "−" : "+";
		});
	});
});

//contact us form
function check_form()
{
	var no_error = true;
	var user_name = document.contactfrm.user_name.value;
	var user_email = document.contactfrm.user_email.value;
	var user_message = document.contactfrm.user_message.value;

	if (user_name == "")
	{
		document.getElementById("user_name_error").innerHTML="Please enter your name.";
		no_error = false;
	}
	else
	{
		document.getElementById("user_name_error").innerHTML="";
	}

	if (user_email == "")
	{
		document.getElementById("user_email_error").innerHTML="Please enter your email.";
		no_error = false;
	}
	else
	{
		document.getElementById("user_email_error").innerHTML="";
	}

	if (user_message == "")
	{
		document.getElementById("user_message_error").innerHTML="Please enter the message.";
		no_error = false;
	}
	else
	{
		document.getElementById("user_message_error").innerHTML="";
	}
		
	return no_error;

} 


//checkout
document.addEventListener("DOMContentLoaded", function ()
{
	var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
	var serviceType = localStorage.getItem('serviceType') || 'delivery';
	var itemsContainer = document.getElementById('checkout-items');

	var subtotal = 0, packageFee = 0, deliveryFee = 0, tax = 0;

	// If Dine-In，show button
	if (serviceType === 'dinein') 
	{
		document.getElementById('dinein-buttons').innerHTML = `<button style="margin: 10px; padding:10px 20px; background:#6f4e37; color:white; border:none; border-radius:5px; cursor:pointer;" onclick="handleDineInLeave()">Leave</button>`;
		document.querySelector('.container-form').style.display = 'none';
	}

    if (cartItems.length === 0) 
	{
        itemsContainer.innerHTML = "<p>Your cart is empty. <a href='product1.html'>Go to menu</a></p>";
        return;
    }

 
    cartItems.forEach(function (item) 
	{
        subtotal += item.price * item.quantity;
        packageFee += (serviceType === "delivery" ? 1.00 * item.quantity : 0);

        var itemRow = document.createElement('div');
        itemRow.classList.add('checkout-item');
        itemRow.innerHTML = `
            <div class="item-info">
				<table>
					<tr>
						<td><img src="${item.image}"></td>
						<td><p class="iname">${item.name} (${item.size})</p></td>
						<td><p class="iquantity">${item.quantity}</p></td>
						<td><p class="iprice">RM ${(item.price * item.quantity).toFixed(2)}</p></td>
					</tr>
				</table>
            </div>
        `;
        itemsContainer.appendChild(itemRow);
    });

    if (serviceType === "delivery")
	{
        deliveryFee = 5.00;
        tax = subtotal * 0.06;
    } 
	else
	{
        deliveryFee = 0;
        tax = subtotal * 0.10; 
    }

    var totalPrice = subtotal + tax + deliveryFee + packageFee;

    document.getElementById('checkout-service-type').textContent = serviceType === "delivery" ? "Delivery" : "Dine-In";
        
    document.getElementById('checkout-subtotal').textContent = "RM " + subtotal.toFixed(2);
    document.getElementById('checkout-delivery').textContent = "RM " + deliveryFee.toFixed(2);
    document.getElementById('checkout-package').textContent = "RM " + packageFee.toFixed(2);
    document.getElementById('checkout-tax').textContent = "RM " + tax.toFixed(2);
    document.getElementById('checkout-total').textContent = "RM " + totalPrice.toFixed(2);
});

function check_form()
{
    var serviceType = localStorage.getItem('serviceType') || 'delivery';
    var valid = true;

    if (serviceType === 'delivery')
	{
        var name = document.getElementById('cust_name').value.trim();
        var phone = document.getElementById('phone_number').value.trim();
        var email = document.getElementById('email').value.trim();
        var method = document.getElementById('method').value;
        var flat = document.getElementById('flat').value.trim();
        var street = document.getElementById('street').value.trim();
        var city = document.getElementById('city').value.trim();
        var state = document.getElementById('state').value.trim();
        var country = document.getElementById('country').value.trim();
        var poscode = document.getElementById('poscode').value.trim();

        var errors = document.querySelectorAll('.inputBox span');
        for (var i = 0; i < errors.length; i++)
		{
            errors[i].textContent = '';
		}

		if (name === "") 
        { 
            document.getElementById('err_name').textContent = "Please enter your name."; 
			valid = false; 
        }
		if (phone === "" ) 
        { 
            document.getElementById('err_phone').textContent = "Please enter your phone number."; 
			valid = false; 
        }
		else if (!/^\d+$/.test(phone))
		{
			document.getElementById('err_phone').textContent = "Please enter a valid phone number.";
			valid = false; 
		}
		if (email === "" ) 
        { 
            document.getElementById('err_email').textContent = "Please enter your email."; 
			valid = false; 
        }
		else if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email))
		{
			document.getElementById('err_email').textContent = "Please enter a valid email."; 
			valid = false;
		}
		if (method === "p0") 
        { 
            document.getElementById('err_method').textContent = "Please select a payment method."; 
			valid = false; 
        }
		if (flat === "") 
        { 
            document.getElementById('err_flat').textContent = "Address line 1 cannot be empty."; 
			valid = false; 
        }
		if (street === "") 
        { 
            document.getElementById('err_street').textContent = "Address line 2 cannot be empty."; 
			valid = false; 
        }
		if (city === "")
        { 
            document.getElementById('err_city').textContent = "City cannot be empty."; 
			valid = false; 
        }
		if (state === "") 
        { 
            document.getElementById('err_state').textContent = "State cannot be empty."; 
			valid = false; 
        }
		if (country === "") 
        { 
            document.getElementById('err_country').textContent = "Country cannot be empty."; 
			valid = false; 
        }
		if (poscode === "")
        { 
            document.getElementById('err_poscode').textContent = "Please enter postal code."; 
			valid = false; 
        }
		else if (!/^\d{4,6}$/.test(poscode))
		{
			document.getElementById('err_poscode').textContent = "Please enter a valid postal code."; 
			valid = false; 
		}

		if (!valid) return false;
    }

    var message = serviceType === 'dinein' 
        ? "Your Dine-In order is completed.\n\nDo you want to stay and review it?"
        : "Your Delivery order is completed.\n\nDo you want to go back home page?";
    var confirmAction = confirm(message);

    if (confirmAction)
	{
        localStorage.removeItem('cartItems');
        localStorage.removeItem('cartTotal');
        localStorage.removeItem('serviceType');
        window.location.href = "index.html";
    }
	else 
	{
        alert("You can now review your order details.");
    }

    return false;
}

function handleDineInLeave()
{
	localStorage.removeItem('cartItems');
	localStorage.removeItem('cartTotal');
	localStorage.removeItem('serviceType');
	alert("You have chosen to leave. Returning to home...");
	window.location.href = "index.html";
}

/*Login and sign up form*/
// Switching between login and registration forms
document.addEventListener('DOMContentLoaded', () => 
{
	var loginForm = document.getElementById('login-form');
	var registerForm = document.getElementById('register-form');
	var forgotForm = document.getElementById('forgot-form');
	var showRegisterBtn = document.getElementById('show-register');
	var showLoginBtn = document.getElementById('show-login');
	var showForgotBtn = document.getElementById('show-forgot');
	var backToLoginBtn = document.getElementById('back-to-login');
	var loginContainer = document.querySelector('.login-container');
			
	// The registration form is displayed, and the decoration area is moved to the right
	showRegisterBtn.addEventListener('click', () => 
	{
		loginForm.classList.add('hidden');
		registerForm.classList.remove('hidden');
		forgotForm.classList.add('hidden');
				
		//Add state class to switch layout order
		loginContainer.classList.add('register-active');
	});
			
	// The login form is displayed, and the decoration area is moved to the left.
	showLoginBtn.addEventListener('click', () => 
	{
		registerForm.classList.add('hidden');
		loginForm.classList.remove('hidden');
		forgotForm.classList.add('hidden');
				
		//Remove the state class and restore the original layout
		loginContainer.classList.remove('register-active');
	});
			
	// Show forgotten password form
	showForgotBtn.addEventListener('click', () => 
	{
		loginForm.classList.add('hidden');
		registerForm.classList.add('hidden');
		forgotForm.classList.remove('hidden');
	});
			
	// Return to the login form
	backToLoginBtn.addEventListener('click', () => 
	{
		forgotForm.classList.add('hidden');
		loginForm.classList.remove('hidden');
	});
			
	// Form submission processing
	var allForms = document.querySelectorAll('form');
	allForms.forEach(form => 
	{
		form.addEventListener('submit', (e) => 
		{
			e.preventDefault();
					
			// Here you can add form validation and submission logic
			var formId = form.id;
			let message = '';
					
			if (formId === 'login-form') 
			{
				message = 'Login successful!';
			}
			else if (formId === 'register-form') 
			{
				message = 'Registration successful! Welcome to BlindX!';
			} 
			else if (formId === 'forgot-form') 
			{
				message = 'The reset link has been sent to your email, please check!';
			}
					
			alert(message);
		});
	});
});