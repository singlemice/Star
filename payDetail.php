<?php 

class payDetail {
	
	 var $payType,$payDate,$payPart,$payProject,$payContent;
	 var $payNum,$payCreator,$payRemark,$payMonth,$payState;
	/**
	 * @return the $payState
	 */
	public function getPayState() {
		return $this->payState;
	}

	/**
	 * @param field_type $payState
	 */
	public function setPayState($payState) {
		$this->payState = $payState;
	}

	/**
	 * @return the $payMonth
	 */
	public function getPayMonth() {
		return $this->payMonth;
	}

	/**
	 * @param field_type $payMonth
	 */
	public function setPayMonth($payMonth) {
		$this->payMonth = $payMonth;
	}

	/**
	 * @return the $payType
	 */
	public function getPayType() {
		return $this->payType;
	}

	/**
	 * @return the $payDate
	 */
	public function getPayDate() {
		return $this->payDate;
	}

	/**
	 * @return the $payPart
	 */
	public function getPayPart() {
		return $this->payPart;
	}

	/**
	 * @return the $payProject
	 */
	public function getPayProject() {
		return $this->payProject;
	}

	/**
	 * @return the $payContent
	 */
	public function getPayContent() {
		return $this->payContent;
	}

	/**
	 * @return the $payNum
	 */
	public function getPayNum() {
		return $this->payNum;
	}

	/**
	 * @return the $payCreator
	 */
	public function getPayCreator() {
		return $this->payCreator;
	}

	/**
	 * @return the $payRemark
	 */
	public function getPayRemark() {
		return $this->payRemark;
	}

	/**
	 * @param field_type $payType
	 */
	public function setPayType($payType) {
		$this->payType = $payType;
	}

	/**
	 * @param field_type $payDate
	 */
	public function setPayDate($payDate) {
		$this->payDate = $payDate;
	}

	/**
	 * @param field_type $payPart
	 */
	public function setPayPart($payPart) {
		$this->payPart = $payPart;
	}

	/**
	 * @param field_type $payProject
	 */
	public function setPayProject($payProject) {
		$this->payProject = $payProject;
	}

	/**
	 * @param field_type $payContent
	 */
	public function setPayContent($payContent) {
		$this->payContent = $payContent;
	}

	/**
	 * @param field_type $payNum
	 */
	public function setPayNum($payNum) {
		$this->payNum = $payNum;
	}

	/**
	 * @param field_type $payCreator
	 */
	public function setPayCreator($payCreator) {
		$this->payCreator = $payCreator;
	}

	/**
	 * @param field_type $payRemark
	 */
	public function setPayRemark($payRemark) {
		$this->payRemark = $payRemark;
	}

	 
}
?>