<?php
require_once dirname( __FILE__ ) . '/runty-core.php';

function runty_loader( $buffer ) {
	$aloha = '
	<link rel="stylesheet" href="../runty/css/runty.css" type="text/css">
	<!-- move plugins to settings, once in dev AE branch -->
    <script src="../runty/app/js/aloha-editor/lib/aloha.js" </script>
	        data-aloha-plugins="common/format,
	                            common/table,
	                            common/list,
	                            common/link,
	                            common/highlighteditables,
	                            common/block,
	                            common/undo,
	                            common/contenthandler,
	                            common/paste,
	                            common/commands,
	                            extra/flag-icons,
	                            common/abbr,
	                            extra/browser,
	                            extra/linkbrowser"></script>

	<script type="text/javascript">
		Aloha.ready( function() {
			Aloha.jQuery(".runty-editable").aloha();
		});
	</script>
	';
  return ( str_replace( "</head>", "\n\n$aloha\n\n</head>", $buffer ) );
}

// call runty_loader callback function 
ob_start( 'runty_loader' );

// tidy contents in order to get valid html
ob_start( 'ob_tidyhandler' );

?>