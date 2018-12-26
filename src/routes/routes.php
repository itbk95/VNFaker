<?php

Route::get('vnfaker', function() {
	// test something here...
	// print_r(vnfaker()->city(true));
	// echo vnfaker()->str_clean(vnfaker()->vnToString('Hoàng Sa, Trường Sa là của Việt Nam'), true);
	echo vnfaker()->paragraphs();
});
