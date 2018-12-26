<?php

use Buihuycuong\Vnfaker\VNFaker;

Route::get('vnfaker', function() {
	echo vnfaker()->date();
});
