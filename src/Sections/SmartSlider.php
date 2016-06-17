<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class SmartSlider{
	private $id;

	public function __construct($id)
	{
		$this->id = $id;

	}
	public function show(){
		$output="<div class='SmartSlider' id='Smart{$this->id}'>";
		$output.=do_shortcode('[smartslider3 slider='.$this->id.']');
		$output.="</div>";
		return $output;
	}
}
?>
