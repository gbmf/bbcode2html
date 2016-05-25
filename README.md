# bbcode2html

A simple FAST parser to convert BBCode to HTML

``` php
Syntax BBCode Sample:
	// --------------
	// Bold 			[b]Hello[/b]
	// Underlined 		[u]Hello[/u]
	// Italics 			[i]Hello[/i]
	// Strikethrough 	[s]Hello[/s]
	// Forced Linebreak [br]
	// Colors 			[color=red]Hello[/color]
	// 					[color=#FF0000]Hello[/color]
	// Font Size 		[size=9]Hello[/size]
	// Font Type 		[font=Verdana]Hello[/font]
	// Alignment 		[align=left]left aligned text[/align]
	//  				[align=center]centered text[/align]
	//  				[center]centered text[/center]
	//  				[align=right]right aligned text[/align]
	// Quotes 			[quote]Hello[/quote]
	//  				[quote="Name"]Hello[/quote]
	//  				[quote=Name]Hello[/quote]
	// Code 			[code]Hello[/code] (text between code tags is not modified)
	// Unordered Lists 	[list] [*]Red [*]Blue [*]Yellow [/list]
	// Ordered Lists 	[list=1] [*]Red [*]Blue [*]Yellow [/list]
	//  				[list=a] [*]Red [*]Blue [*]Yellow [/list]
	// Links 			[url]http://www.example.com/[/url]
	//  				[url=http://www.example.com/]Example[/url]
	// Email 			[email]user@domain.com[/email]
	//   				[email=user@domain.com]email me[/email]
	// Images 			[img]http://domain.com/image.jpg[/img]
```	
	
## Installation

``` php
	<?php include 'bb2html.php'; ?>
```

## Usage

``` php
	<?php $htmltext = bb2html($bbtext); ?>
```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## Credits

HeikoG
