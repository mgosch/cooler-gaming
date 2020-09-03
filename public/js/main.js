new Cleave('#ccn', {
	creditCard: true,
	delimiter: '-',
	onCreditCardTypeChanged: function(type) {
		if(type === 'visa'){
            document.querySelector('.fa-cc-visa').classList.add('active');
        } else {
            document.querySelector('.fa-cc-visa').classList.remove('active');
		}
		if(type === 'mastercard'){
            document.querySelector('.fa-cc-mastercard').classList.add('active');
        } else {
            document.querySelector('.fa-cc-mastercard').classList.remove('active');
		}
		if(type === 'amex'){
            document.querySelector('.fa-cc-amex').classList.add('active');
        } else {
            document.querySelector('.fa-cc-amex').classList.remove('active');
        }
	}
});

new Cleave('#ccv', {
	numeral: true,
	numeralThousandsGroupStyle: 'none',
	numeralIntegerScale: 4
});

new Cleave('#expiry', {
	date: true,
	datePattern: ['m', 'y']
});