$(document).ready(function(){
	var users = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('naziv'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: 'iskanje.php?query=%QUERY'
	});

	users.initialize();

	$('#hotel').typeahead({
		hint: true,
		highlight: true,
		minLenght: 2
	}, {
		name: 'hotel',
		displayKey: 'hotel',
		source: users.ttAdapter() 
	});
});