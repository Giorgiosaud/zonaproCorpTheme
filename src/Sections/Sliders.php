<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class Sliders{
	public function __construct()
	{
	}
	public function show(){
		return the_field('slider');
	}
}
?>
