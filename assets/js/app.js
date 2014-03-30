// randomise array order
$.randomize = function(arr)
{
	for (var i = arr.length - 1; i > 0; i--)
	{
		var j = Math.floor(Math.random() * (i + 1));
		var temp = arr[i];
		arr[i] = arr[j];
		arr[j] = temp;
	}

	return arr;
};

// quick and easy method to replace a single html snippet with repeating data
// also replaces any {{placeholders}} if provided.
function populate_template(tpl, data)
{
	var $orig_tpl = $(tpl);
	
	tpl = $orig_tpl.clone().removeClass('tpl');
	tpl = tpl.wrap('<div>').parent().html();

	$.each(data, function(i, record)
	{
		var tpl_instance = $(tpl.replace(/\{\{(\w+)\}\}/g, function(str, key)
		{
			return record[key] || str;
		}));

		tpl_instance.find('[data-src]').each(function()
		{
			$(this).attr('src', $(this).data('src'));
			$(this).removeAttr('data-src');
		});

		$orig_tpl.after(tpl_instance);
	});
}

// fonts
try{Typekit.load();}catch(e){}

// tweet in new window
$('#maintweeta, #inlinetweeta').on('click', function(e)
{
	e.preventDefault();
	var w = window.open('https://twitter.com/share?source=tweetbutton&text=I%27m+campaigning+for+the+web+design+app+we+need&url=http%3A%2F%2Fprojectmeteor.org%2F&via=project_meteor', 'twindow', 'height=420,width=550');
	w.focus();
});

(function()
{
	// quotes
	var quotes = [
		{
			'name': 'Elliot Jay Stocks',
			'text': 'Hell yes: <a href="http://projectmeteor.org">projectmeteor.org</a>',
			'image': 'https://pbs.twimg.com/profile_images/378800000155626615/7a8e82a5601d9c0c45853f70af49025d_bigger.jpeg',
		},
		{
			'name': 'Jeffrey Zeldman',
			'text': 'I\'m campaigning for the web design app we need <a href="http://projectmeteor.org">projectmeteor.org</a> via <a href="http://twitter.com/project_meteor">@project_meteor</a>',
			'image': 'https://pbs.twimg.com/profile_images/421007790031646720/wc3Wtcul_bigger.png',
		},
		{
			'name': '.Net Magazine',
			'text': 'The perfect web design app... and why it doesn\'t exist. Will <a href="http://twitter.com/project_meteor">@project_meteor</a> bring the answer? <a href="http://projectmeteor.org">projectmeteor.org</a>',
			'image': 'https://pbs.twimg.com/profile_images/378800000697523305/d556bef753c6ac3933e9d5bf9f147418_bigger.jpeg',
		}
	];

	// insurgents
	var insurgents = [
		{'name': 'Nathan Pitman', 'twitter': 'nathanpitman', 'pic': 'np.jpg'},
		{'name': 'Elliot Lewis',  'twitter': 'elliotlewis',  'pic': 'el.jpg'},
		{'name': 'Darren Miller', 'twitter': 'darrenmiller', 'pic': 'dm.jpg'},
		{'name': 'David Dixon',   'twitter': 'daviddixon',   'pic': 'dd.jpg'},
	];

	populate_template('#quotes .tpl', quotes);
	populate_template('#about .tpl', $.randomize(insurgents));

})();
