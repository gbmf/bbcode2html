<?php
	// A simple FAST parser to convert BBCode to HTML
	// Trade-in more restrictive grammar for speed and simplicty
	//
	// Syntax Sample:
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

	//
	// Usage:
	// ------
	// <?php include 'bb2html.php'; ?_>
	// <?php $htmltext = bb2html($bbtext); ?_>
	//
	// (please do not remove credit)
	// author: HeikoG
	// website: http://HeikoG.Berlin
	// date: 05/2016
	
	/*
	$content = "
	Bold 			[b]Hello[/b]
	Underlined 		[u]Hello[/u]
	Italics 		[i]Hello[/i]
	Strikethrough 	[s]Hello[/s]
	Forced Linebreak[br]
	Colors 			[color=red]Hello[/color]
					[color=#FF0000]Hello[/color]
	Font Size 		[size=9]Hello[/size]
	Font Type 		[font=Verdana]Hello[/font]
	Alignment 		[align=left]left aligned text[/align]
	  				[align=center]centered text[/align]
	  				[center]centered text[/center]
	  				[align=right]right aligned text[/align]
	Quotes 			[quote]Hello[/quote]
	  				[quote='Name']Hello[/quote]
	  				[quote=Name]Hello[/quote]
	Code 			[code]Hello[/code] (text between code tags is not modified)
	Unordered Lists [list] [*]Red [*]Blue [*]Yellow [/list]
	Ordered Lists 	[list=1] [*]Red [*]Blue [*]Yellow [/list]
	 				[list=a] [*]Red [*]Blue [*]Yellow [/list]
	Links 			[url]http://www.example.com/[/url]
	  				[url=http://www.example.com/]Example[/url]
	Email 			[email]user@domain.com[/email]
	   				[email=user@domain.com]email me[/email]
	Images 			[img]http://domain.com/image.jpg[/img]"
	;
	*/
	
	function bbc2html($tmpText){
	/*[b]*/ 	$tmpText = preg_replace('#\[b\](.*)\[/b\]#isU', '<strong>$1</strong>', $tmpText);
	/*[i]*/	 	$tmpText = preg_replace('#\[i\](.*)\[/i\]#isU', '<em>$1</em>', $tmpText);
	/*[s]*/	 	$tmpText = preg_replace('#\[s\](.*)\[/s\]#isU', '<del>$1</del>', $tmpText);
	/*[br]*/	$tmpText = preg_replace('#\[br\]#isU', '<br />', $tmpText);
	/*[u]*/	 	$tmpText = preg_replace('#\[u\](.*)\[/u\]#isU', '<span style="text-decoration:underline">$1</span>', $tmpText);
	/*[color]*/ $tmpText = preg_replace('#\[color=(.*)\](.*)\[\/color\]#isU', '<span style="color:$1;">$2</span>', $tmpText);
	/*[size]*/ 	$tmpText = preg_replace('#\[size=([0-9]{1,2})\](.*)\[\/size\]#isU', '<span style="font-size:$1px;">$2</span>', $tmpText);
	/*[font]*/ 	$tmpText = preg_replace('#\[font=(.*)\](.*)\[\/font\]#isU', '<span style="font-family:$1;">$2</span>', $tmpText);
	/*[url=]*/	$tmpText = preg_replace('#\[url=(.*)\](.*)\[\/url\]#isU', '<a href="$1" target="">$2</a>', $tmpText);
	/*[url]*/	$tmpText = preg_replace('#\[url\](.*)\[\/url\]#isU', '<a href="$1" target="">$1</a>', $tmpText);
	/*[img]*/	$tmpText = preg_replace('#\[img\](.*)\[\/img\]#isU', '<img src="$1" alt="Bild" />', $tmpText);
	/*[align]*/ $tmpText = preg_replace('#\[align=(.*)\](.*)\[\/align\]#isU', '<div style="text-align:$1">$2</div>', $tmpText); 
	/*[center]*/$tmpText = preg_replace('#\[center\](.*)\[\/center\]#isU', '<div style="text-align:center">$1</div>', $tmpText);
	/*[right]*/ $tmpText = preg_replace('#\[right\](.*)\[\/right\]#isU', '<div style="text-align:right">$1</div>', $tmpText);
	/*[left]*/ 	$tmpText = preg_replace('#\[left\](.*)\[\/left\]#isU', '<div style="text-align:left">$1</div>', $tmpText);
	/*[code]*/ 	$tmpText = preg_replace('#\[code\](.*)\[\/code\]#isU', '<code>$1</code>', $tmpText);
	/*[quote]*/ $tmpText = preg_replace('#\[quote\](.*)\[\/quote\]#isU', '<table width=100% bgcolor=lightgray><tr><td bgcolor=white>$1</td></tr></table>', $tmpText);
	/*[quote=]*/$tmpText = preg_replace('#\[quote=(.*)\](.*)\[\/quote\]#isU', '<table width=100% bgcolor=lightgray><tr><td bgcolor=white>$1<blockquote>$2</blockquote></td></tr></table>', $tmpText);
	/*[mail=]*/	$tmpText = preg_replace('#\[mail=(.*)\](.*)\[\/mail\]#isU', '<a href="mailto:$1">$2</a>', $tmpText);
	/*[mail]*/ 	$tmpText = preg_replace('#\[mail\](.*)\[\/mail\]#isU', '<a href="mailto:$1">$1</a>', $tmpText);
	/*[email=]*/$tmpText = preg_replace('#\[email=(.*)\](.*)\[\/email\]#isU', '<a href="mailto:$1">$2</a>', $tmpText);
	/*[email]*/ $tmpText = preg_replace('#\[email\](.*)\[\/email\]#isU', '<a href="mailto:$1">$1</a>', $tmpText);
	/*[list]*/
		while(preg_match('#\[list\](.*)\[\/list\]#is', $tmpText)){
			$tmpText = preg_replace_callback('#\[list\](.*)\[\/list\]#isU',
				create_function('$str',"return str_replace(array(\"\\r\",\"\\n\"),'','<ul>'.preg_replace('#\[\*\](.*)\$#isU',
				'<li>\$1</li>',preg_replace('#\[\*\](.*)(\<li\>|\$)#isU','<li>\$1</li>\$2',preg_replace('#\[\*\](.*)(\[\*\]|\$)#isU',
				'<li>\$1</li>\$2',\$str[1]))).'</ul>');"), $tmpText);
			$tmpText = preg_replace('#<ul></li>(.*)</ul>(<li>|</ul>)#isU', '<ul>$1</ul></li>$2', $tmpText); // Validitäts-Korrektur
		}

	/*[list=]*/
		while(preg_match('#\[list=.\](.*)\[\/list\]#is', $tmpText)){
			$tmpText = preg_replace_callback('#\[list=.\](.*)\[\/list\]#isU',
				create_function('$str',"return str_replace(array(\"\\r\",\"\\n\"),'','<ul><ol>'.preg_replace('#\[\*\](.*)\$#isU',
				'<li>\$1</li>',preg_replace('#\[\*\](.*)(\<li\>|\$)#isU','<li>\$1</li>\$2',preg_replace('#\[\*\](.*)(\[\*\]|\$)#isU',
				'<li>\$1</li>\$2',\$str[1]))).'</ol></ul>');"), $tmpText);
			$tmpText = preg_replace('#<ul></li>(.*)</ul>(<li>|</ul>)#isU', '<ul>$1</ul></li>$2', $tmpText); // Validitäts-Korrektur
		}
	return $tmpText;
	}
		
	echo bbc2html($content);

?>