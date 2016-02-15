<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

	public $base;
	public $css;
	public $path_upload;
	public $path_upload_profiles;
	public $path_upload_safetytalks;
	public $path_upload_safetytalks_image;
	public $path_upload_paragraph_images;
	public $path_upload_custom_inspections;
	public $path_upload_custom_safetytalks;
	public $path_upload_inspections;
	public $path_upload_investigation_photoes;
	public $path_upload_material_involved;
	public $path_upload_alerts;
	public $path_upload_procedures;

	public $path_img_library;
	public $path_img_digitalproject;
	public $path_img_slider;
	public $path_img_getstarted;
	public $path_img_fatality;
	public $path_img_pointslevel;
	public $path_img_my_wallet;
	public $path_img_buy_credits;
	public $path_img_challenges;
	public $path_img_awareness_training;
	public $path_img_icons;

	public $site_email;

	function __construct()
	{
		parent::__construct();

	    $this->base 							= $this->config->item('base_url');
		$this->css 								= $this->config->item('css');
		
		$this->path_upload 						= $this->config->item('path_upload');
		$this->path_upload_profiles 			= $this->config->item('path_upload_profiles');
		$this->path_upload_safetytalks 			= $this->config->item('path_upload_safetytalks');
		$this->path_upload_safetytalks_image	= $this->config->item('path_upload_safetytalks_image');
		$this->path_upload_paragraph_images 	= $this->config->item('path_upload_paragraph_images');
		$this->path_upload_custom_inspections 	= $this->config->item('path_upload_custom_inspections');
		$this->path_upload_custom_safetytalks 	= $this->config->item('path_upload_custom_safetytalks');
		$this->path_upload_inspections 			= $this->config->item('path_upload_inspections');
		$this->path_upload_investigation_photoes= $this->config->item('path_upload_investigation_photoes');
		$this->path_upload_material_involved 	= $this->config->item('path_upload_material_involved');
		$this->path_upload_alerts 				= $this->config->item('path_upload_alerts');
		$this->path_upload_procedures 			= $this->config->item('path_upload_procedures');
		
		$this->path_img_library 				= $this->config->item('path_img_library');
		$this->path_img_digitalproject 			= $this->config->item('path_img_digitalproject');
		$this->path_img_slider 					= $this->config->item('path_img_slider');
		$this->path_img_getstarted 				= $this->config->item('path_img_getstarted');
		$this->path_img_fatality 				= $this->config->item('path_img_fatality');
		$this->path_img_pointslevel 			= $this->config->item('path_img_pointslevel');
		$this->path_img_my_wallet 				= $this->config->item('path_img_my_wallet');
		$this->path_img_buy_credits 			= $this->config->item('path_img_buy_credits');
		$this->path_img_challenges 				= $this->config->item('path_img_challenges');
		$this->path_img_awareness_training 		= $this->config->item('path_img_awareness_training');
		$this->path_img_icons 					= $this->config->item('path_img_icons');
		
		$this->site_email 						= $this->config->item('site_email');
	}
}