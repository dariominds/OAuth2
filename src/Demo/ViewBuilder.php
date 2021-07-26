<?php

namespace DealerEProcess\TheConstruct\Demo;

/**
 * ViewBuilder
 *
 * @uses VehicleView
 */
class ViewBuilder
{

	/**
	 * build and return homeView
	 *
	 * @return HomeView
	 */
	public function buildHomeView()
	{
		return new HomeView;
	}

	/**
	 * build and return Profile View
	 *
	 * @return ProfileView
	 */
	public function buildProfileView($user)
	{
		return new ProfileView($user);
	}

}
