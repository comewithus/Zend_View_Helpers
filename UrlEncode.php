<?php
/**
 *
 * @author yohan
 * @version 
 */
require_once 'Zend/View/Interface.php';

/**
 * A simple url encoder with base64 to solve spécials chars problem
 * some base64 chars that are part of standars url are modified : +=/
 * 
 * @example encode : $this->urlEncode('str');
 * 			decode : $this->urlEncode('str',true);
 * 
 *
 * @uses viewHelper Zend_View_Helper
 */
class Zend_View_Helper_UrlEncode {
	
	/**
	 * @var Zend_View_Interface 
	 */
	public $view;
	
	/**
	 * 
	 */
	public function urlEncode($url = null,$decode = false) {
		if(!is_null($url)) {
			if($decode) {
				return $this->decode($url);
			}
			else {
				return $this->encode($url);
			}
		}
		
		return $this;
	}
	
	public function encode($url)
	{
		return strtr(base64_encode($url), '+/=', '-_.');
	}
	
	public function decode($url)
	{
		return base64_decode(strtr($url,'-_.','+/='));
	}
	
	/**
	 * Sets the view field 
	 * @param $view Zend_View_Interface
	 */
	public function setView(Zend_View_Interface $view) {
		$this->view = $view;
	}
}

