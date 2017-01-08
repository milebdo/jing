/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbar = [
		{ name : 'styles',		items : [ 'Bold', 'Italic', 'Underline' ] },
		{ name : 'insert',		items : [ 'Image', 'SpecialChar', 'HorizontalRule' ] }
	];

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	// Extra Plugins
	config.extraPlugins = '';
};
