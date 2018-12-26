<?php
use Buihuycuong\Vnfaker\VNFaker;
/** @return Buihuycuong\Vnfaker\VNFaker; */
function vnfaker(): VNFaker
{
    return app(VNFaker::class);
}