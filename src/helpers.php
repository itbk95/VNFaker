<?php
use Buihuycuong\Vnfaker\VNFaker;
/** @return Buihuycuong\Vnfaker\VNFaker; */
if (! function_exists('vnfaker')) {
	function vnfaker(): VNFaker
	{
	    return app(VNFaker::class);
	}
}
