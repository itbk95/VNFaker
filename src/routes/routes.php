<?php

Route::get('vnfaker', function() {
	// test something here...
	// print_r(vnfaker()->city(true));
	echo vnfaker()->fullname();
});
