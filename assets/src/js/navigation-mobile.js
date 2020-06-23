'use strict';
const navButton = document.getElementById( 'main-navigation-toggle' );
navButton.addEventListener( 'click', () => {
	const nav = document.getElementsByTagName( 'body' )[ 0 ];
	const openClass = 'main-navigation-open';
	const ariaAttr = 'aria-expanded';
	const isOpen = nav.classList.toggle( openClass );
	if ( isOpen ) {
		navButton.setAttribute( ariaAttr, 'true' );
	} else {
		navButton.setAttribute( ariaAttr, 'false' );
	}
} );
