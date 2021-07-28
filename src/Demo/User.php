<?php

namespace DealerEProcess\TheConstruct\Demo;

/**
 *  Service Class
 *
 *  Use to facilitate all the vehicle operations.
 */
class User
{
	var $full_name;
	var $email;
	var $profile_image;
	var $log_status;

	/**
	 * Construct user data
	 */
	public function __construct($full_name, $email, $profile_image, $log_status)
	{
		$this->setFullName($full_name);
		$this->setEmail($email);
		$this->setProfileImage($profile_image);
		$this->setLogStatus($log_status);
	}

	/**
	 * set the value for fullname function
	 *
	 * @param string $full_name
	 * @return void
	 */
	private function setFullName($full_name)
	{
		$this->full_name = $full_name;
	}

	/**
	 * set value for email function
	 *
	 * @param string $email
	 * @return void
	 */
	private function setEmail($email)
	{
		$this->email = $email;
	}

	private function setLogStatus($status)
	{
		$this->log_status = $status;
	}

	/**
	 * set value for profile image function
	 *
	 * @param string $image_url
	 * @return void
	 */
	private function setProfileImage($image_url)
	{
		$this->profile_image = $image_url;
	}

	/**
	 * get value of fullname function
	 *
	 * @return string $full_name
	 */
	public function getFullName()
	{
		return $this->full_name;
	}

	public function getLogStatus()
	{
		return $this->log_status;
	}

	/**
	 * get value of user email function
	 *
	 * @return string $email
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * get url path of profile image function
	 *
	 * @return string $profile_image
	 */
	public function getProfileImage()
	{
		return $this->profile_image;
	}
}

