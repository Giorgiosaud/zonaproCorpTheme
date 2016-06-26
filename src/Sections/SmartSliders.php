<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class SmartSliders{
	protected $id;
	public function __construct()
	{
		$this->id=get_sub_field('slider');
	}
	public function show(){
		$output="<div class='SmartSlider' id='Smart{$this->id}'>";
		$output.=do_shortcode('[smartslider3 slider='.$this->id.']');
		$output.="</div>";
		return $output;
//		$output="hola";
//		$output.=do_shortcode('[smartslider3 slider='.$this->id.']');
//		$output.="</div>";
//		return $output;
	}
}
?>
