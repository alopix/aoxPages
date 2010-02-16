/**
 * aoxPages
 * 
 * a free as in beer homepage management system
 * 
 * @license		Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 Austria License
 * @author		Dustin Steiner
 * @link		http://www.alopix.net
 * @email		dustin.steiner@gmail.com
 * 
 * @file		style.js
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */

function modifyMenulinks(parentObjectID) {
	var parentObject = document.getElementById(parentObjectID);
	if (parentObject) {
		var menuEntries = parentObject.childNodes;
		for (var i = 0; i < menuEntries.length; i++) {
			if (menuEntries[i].nodeType == 1) {
				var linkHref = menuEntries[i].firstChild.getAttribute('href');
				menuEntries[i].onclick = function() {
					window.location.href = linkHref;
				}
			}
		}
	}
}

window.onload = function() {
	modifyMenulinks('menu');
}
