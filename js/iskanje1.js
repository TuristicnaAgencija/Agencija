$(document).ready(function(){
	var hotels = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('kraj'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: 'iskanje1.php?query=%QUERY'
	});

	hotels.initialize();

	$('#kraj').typeahead({
		hint: true,
		highlight: true,
		minLenght: 2,
	}, {
		name: 'hotels',
		displayKey: 'kraj',
		source: hotels.ttAdapter() 
	});
});