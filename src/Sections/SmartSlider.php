<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class SmartSlider{

	public function __construct()
	{
		$this->id = get_sub_field('id');
		$this->show();	
	}
	public function show(){
		$output="<div class='SmartSlider' id='Smart{$this->id}'>";
		$output.=do_shortcode('[smartslider3 slider='.$this->id.']');
		$output.="</div>";
		echo $output;
		return $output;
	}
}
?>
