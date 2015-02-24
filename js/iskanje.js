$(document).ready(function(){
	var hotels = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('naziv'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: 'iskanje.php?query=%QUERY'
	});

	hotels.initialize();

	$('#hotel').typeahead({
		hint: true,
		highlight: true,
		minLenght: 2
	}, {
		name: 'hotels',
		displayKey: 'naziv',
		source: hotels.ttAdapter() 
	});
});