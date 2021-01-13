<?php

	// Include composer + plugins.
	require_once(__DIR__.'/composer/vendor/autoload.php');

	// Setup HTML compression.
	function compress_html($html) {
		preg_match_all("#\<textarea.*\>.*\<\/textarea\>#Uis", $html, $foundTxt);
		preg_match_all("#\<pre.*\>.*\<\/pre\>#Uis", $html, $foundPre);
		preg_match_all("#\<code.*\>.*\<\/code\>#Uis", $html, $foundCodes);
		preg_match_all("#\<script.*\>.*\<\/script\>#Uis", $html, $foundScripts);

		$html = str_replace($foundTxt[0], array_map(function($el){return "<textarea>$el</textarea>";}, array_keys($foundTxt[0])), $html);
		$html = str_replace($foundPre[0], array_map(function($el){return "<pre>$el</pre>";}, array_keys($foundPre[0])), $html);
		$html = str_replace($foundCodes[0], array_map(function($el){return "<code>$el</code>";}, array_keys($foundCodes[0])), $html);
		$html = str_replace($foundScripts[0], array_map(function($el){return "<script>$el</script>";}, array_keys($foundScripts[0])), $html);

		$search = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/<!--(?!<!)[^\[>].*?-->/', '/\s*([\n\r]|\n\r|\r\n)/m');
		$replace = array('>', '<', '\\1', '', '');
		$html = preg_replace($search, $replace, $html);

		$html = str_replace(array_map(function($el){return "<textarea>$el</textarea>";}, array_keys($foundTxt[0])), $foundTxt[0], $html);
		$html = str_replace(array_map(function($el){return "<pre>$el</pre>";}, array_keys($foundPre[0])), $foundPre[0], $html);
		$html = str_replace(array_map(function($el){return "<code>$el</code>";}, array_keys($foundCodes[0])), $foundCodes[0], $html);
		$html = str_replace(array_map(function($el){return "<script>$el</script>";}, array_keys($foundScripts[0])), $foundScripts[0], $html);

		return $html;
	}

	// Vars
	$markup_file = $_GET['markup'];
	$final_file = $_GET['final'];

	// Error checking
	if (empty($markup_file) || !file_exists($markup_file)) {
		echo 'Invalid markup filepath: '.$markup_file;
		exit;
	}
	if (empty($final_file)) {
		echo 'Invalid final filepath: '.$final_file;
		exit;
	}

	// Get the html contents on the input markup
	ob_start();
	include($markup_file);
	$html_string = ob_get_clean();

	// Pre-mail with plugin.
	// This adds inline styling and optimizations.
	$pm = new \Crossjoin\PreMailer\HtmlString($html_string);
	$pm->setOption($pm::OPTION_HTML_COMMENTS, $pm::OPTION_HTML_COMMENTS_KEEP);
	$pm->setOption($pm::OPTION_STYLE_TAG, $pm::OPTION_STYLE_TAG_REMOVE);
	$html = $pm->getHtml();
	$html = compress_html($html);
	$html = str_replace(['®', '©'], ['&reg;', '&copy;'], $html);

	// Get the body contents from the pre-mail'd code and echo into new template.
	preg_match('~<body.*?>(.*?)<\/body>~is', $html, $match);
	$final_template = trim('
<!DOCTYPE html>
<html>
	<head>
		<title>Email Template</title>
		<meta charset="utf-8">
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="x-apple-disable-message-reformatting">
	</head>
	'.$match[0].'
</html>
	');

	// Echo our results to the browser.
	echo $final_template;

	// Modify some variables to work in final.html
	$final_template = str_replace($_GET['uri'].'/', './', $final_template);

	// Write our results to the final.html file.
	$file = fopen($final_file, 'w') or die('Unable to open file!');
	fwrite($file, $final_template);
	fclose($file);

?>