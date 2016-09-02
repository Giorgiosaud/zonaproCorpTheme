<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class RevSliderById{

	public function __construct()
	{
		$this->id = get_sub_field('id');
		echo $this->show();
	}

	public function show(){
		$output="<div class='RevSlider' id='Rev{$this->id}'>";
		$output.=do_shortcode('[rev_slider alias="'.$this->id.'"]');
		$output.="</div>";
		return $output;
	}
}
?>
