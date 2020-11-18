/**
 * Author: Kirteshkumar Mehta
 * Date: 20/10/2020
 * Version: 1.0
 * Purpose: create JavaScript for all web pages
 */

/**
 * Purpose: left animation
 * 
 * @returns
 */

function moveAd() {
	left = 0;
	setInterval(function() {
		image = document.getElementById("sideImage");
		image.style.left = left + "px";
		left--;
		if (left == -500) {
			left = 0;
		}
	}, 50);
}

function moveText() {
	top1 = -400;
	textNo = 1;
	setInterval(function() {
		if (textNo == 1) {
			text = document.getElementById("text1");
			text.style.display = "inline";
			text.style.top = top1 + "px";
			top1++;
			if (top1 == -100) {
				textNo = 2;
				top1 = -400;
				text.style.display = "none";
			}
		} else {
			text = document.getElementById("text2");
			text.style.display = "inline";
			text.style.top = top1 + "px";
			top1++;
			if (top1 == -100) {
				textNo = 1;
				top1 = -400;
				text.style.display = "none";
			}
		}

	}, 50);
}

/*
function addToCart(e) {
	cart = document.getElementById("cartDiv");
	switch (e.id) {
	case "addBread":
		qty = document.getElementById("breadQty").value;
		cart
				.insertAdjacentHTML(
						'beforeend',
						'<p>DogFood: <input type="number" class="cartInput" id = "cartBread" pName = "DogFood" price="35.20" value="'
								+ qty
								+ '"> Price: $'
								+ (Number(qty) * 35.20)
								+ '</p>');
		break;
	case "addCheese":
		qty = document.getElementById("cheeseQty").value;
		cart
				.insertAdjacentHTML(
						'beforeend',
						'<p>DogFood: <input type="number" class="cartInput" id = "cartCheese" pName = "DogFood" price="33.9" value="'
								+ qty
								+ '"> Price: $'
								+ (Number(qty) * 33.9)
								+ '</p>');
		break;
	case "addSpread":
		qty = document.getElementById("spreadQty").value;
		cart
				.insertAdjacentHTML(
						'beforeend',
						'<p>DogFood: <input type="number" class="cartInput" id = "cartSpread" pName = "DogFood" price="39" value="'
								+ qty
								+ '"> Price: $'
								+ (Number(qty) * 39)
								+ '</p>');
		break;
	case "addMilk1":
		qty = document.getElementById("milk1Qty").value;
		cart
				.insertAdjacentHTML(
						'beforeend',
						'<p>CatFood: <input type="number" class="cartInput" id = "cartMilk1" pName = "CatFood" price="24.5" value="'
								+ qty
								+ '"> Price: $'
								+ (Number(qty) * 24.5)
								+ '</p>');
		break;
	case "addMilk2":
		qty = document.getElementById("milk2Qty").value;
		cart
				.insertAdjacentHTML(
						'beforeend',
						'<p>CatFood: <input type="number" class="cartInput" id = "cartMilk2" pName = "CatFood" price="29.32" value="'
								+ qty
								+ '"> Price: $'
								+ (Number(qty) * 29.32)
								+ '</p>');
		break;
	default:
		// code block
	}

}

function addToInvoice() {
	
}

/!**
 * Show invoice page
 *!/
function invoice() {
	
	voicePage = document.getElementById("voicePage");
	//Get the button that opens the modal
	var btn = document.getElementById("showInvoiceBut");

	//Get the <span> element that closes the model
	var span = document.getElementsByClassName("close")[0];

	//When the user clicks on the button, open the model
	btn.onclick = function() {
		cart = document.getElementsByClassName("cartInput");
		voiceContent = document.getElementById("voice-content");
		Total = 0;
		var elems = document.getElementsByClassName("items");
		i = 0
		while (i<elems.length){
			elems[i].parentNode.removeChild(elems[i]);
		}
		
		
		i = 0;
		while (i < cart.length) {
			console.log(cart[i].id);
			qty = cart[i].value;
			switch (cart[i].id) {
			case "cartBread":
				voiceContent.insertAdjacentHTML(
								'beforeend',
								'<p class = "items">DogFood: Qty:'+ qty +' Price:$' + (Number(qty) * 35.20)+ '</p>');
				Total += (Number(qty) * 35.20);
				break;
			case "cartCheese":
				voiceContent.insertAdjacentHTML(
						'beforeend',
						'<p class = "items">DogFood: Qty:'+ qty +' Price:$' + (Number(qty) * 33.9)+ '</p>');
				Total += (Number(qty) * 33.9);
				break;
			case "cartSpread":
				voiceContent.insertAdjacentHTML(
						'beforeend',
						'<p class = "items">DogFood: Qty:'+ qty +' Price:$' + (Number(qty) * 39)+ '</p>');
				Total += (Number(qty) * 39);
				break;
			case "cartMilk1":
				voiceContent.insertAdjacentHTML(
						'beforeend',
						'<p class = "items">CatFood: Qty:'+ qty +' Price:$' + (Number(qty) * 24.5)+ '</p>');
				Total += (Number(qty) * 24.5);
				break;
			case "cartMilk2":
				voiceContent.insertAdjacentHTML(
						'beforeend',
						'<p class = "items">CatFood: Qty:'+ qty +' Price:$' + (Number(qty) * 29.32)+ '</p>');
				Total += (Number(qty) * 29.32);
				break;
			default:
				// code block
			}
			
			i++;

		}
		voiceContent.insertAdjacentHTML(
				'beforeend',
				'<p class = "items">Total: $'+ Total+'</p>');
		
		voicePage.style.display = "block";
	}

	//When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		voicePage.style.display = "none";
	}

	//When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == voicePage) {
			voicePage.style.display = "none";
		}
	}
}
*/
