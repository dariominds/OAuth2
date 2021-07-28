<?php

namespace DealerEProcess\TheConstruct\Demo;

use DealerEProcess\TheConstruct\Demo\View\HomeView;
use DealerEProcess\TheConstruct\Demo\View\ProfileView;
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
	public function buildHomeView($user)
	{
		return new HomeView($user);
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
