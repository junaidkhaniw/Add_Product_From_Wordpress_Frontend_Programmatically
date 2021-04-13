// const form = document.getElementById('form');
// const name = document.getElementById('name');
// const sku = document.getElementById('sku');
// const price = document.getElementById('price');
// const weight = document.getElementById('weight');

// form.addEventListener('submit', e => {
// 	e.preventDefault();
	
// 	checkInputs();
// });

// function checkInputs() {
// 	// trim to remove the whitespaces
// 	const nameValue = name.value.trim();
// 	const skuValue = sku.value.trim();
// 	const priceValue = price.value.trim();
// 	const weightValue = weight.value.trim();
	
// 	if(nameValue === '') {
// 		setErrorFor(name, 'Name cannot be blank');
// 	} else {
// 		setSuccessFor(name);
// 	}
	
// 	if(skuValue === '') {
// 		setErrorFor(sku, 'sku cannot be blank');
// 	} else if (!issku(skuValue)) {
// 		setErrorFor(sku, 'Not a valid sku');
// 	} else {
// 		setSuccessFor(sku);
// 	}
	
// 	if(priceValue === '') {
// 		setErrorFor(price, 'Price cannot be blank');
// 	} else {
// 		setSuccessFor(price);
// 	}
	
// 	if(weightValue === '') {
// 		setErrorFor(weight, 'weight cannot be blank');
// 	} else if(passwordValue !== weightValue) {
// 		setErrorFor(weight, 'Passwords does not match');
// 	} else{
// 		setSuccessFor(weight);
// 	}
// }

// function setErrorFor(input, message) {
// 	const formControl = input.parentElement;
// 	const small = formControl.querySelector('small');
// 	formControl.className = 'form-control error';
// 	small.innerText = message;
// }

// function setSuccessFor(input) {
// 	const formControl = input.parentElement;
// 	formControl.className = 'form-control success';
// }












// // SOCIAL PANEL JS
// const floating_btn = document.querySelector('.floating-btn');
// const close_btn = document.querySelector('.close-btn');
// const social_panel_container = document.querySelector('.social-panel-container');

// floating_btn.addEventListener('click', () => {
// 	social_panel_container.classList.toggle('visible')
// });

// close_btn.addEventListener('click', () => {
// 	social_panel_container.classList.remove('visible')
// });
