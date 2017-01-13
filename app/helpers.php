<?php
/**
 * Created by PhpStorm.
 * User: Siebe
 * Date: 11/01/2017
 * Time: 19:59
 */
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Generate a localized url from the route name, locale and possible attributes
 *
 * @param $routeName
 * @param null $routeAttributes
 * @param string $local
 *
 * @return
 */
function localizedUrl( $routeName, $routeAttributes = NULL, $local = NULL ) {
	if ( $routeAttributes != NULL ) {
		$url = route( $routeName, $routeAttributes );
	} else {
		$url = route( $routeName );
	}

	return LaravelLocalization::getLocalizedURL( $local, $url );
}

function getTranslatedContent( $key ) {
	$content = \App\Content::where( 'key_human', $key )->firstOrFail();

	return $content->data;
}

function getCountry( $input ) {
	return strtolower( explode( "_", $input )[1] );
}

function getLocal( $input ) {
	return strtolower( explode( "_", $input )[0] );
}

function getSupportedLocales(){
	return LaravelLocalization::getSupportedLocales();
}

function getLocale(){
	return LaravelLocalization::getCurrentLocale();
}

function flashToastr( $style, $title, $content ) {
	$stringyContent = $content;
	if ( is_array( $content ) ) {
		// If the content is an array, convert it to a string
		$stringyContent = "";
		foreach ( $content as $contentMessage ) {
			// Add some paragraphs for nice reading
			$stringyContent .= "<p>" . $contentMessage . "</p>";
		}
	}
	// Set the settings
	$message = [
		"style"   => $style,
		"title"   => $title,
		"content" => $stringyContent
	];
	// Put it in the session for blade to pick it up
	session()->flash( 'messageToastr', $message );
}