Feature: Admin Authentication
	In order to use the site
	As an admin
	I need to be able to login and logout

	Scenario: Login
		Given I am on "admin/login"
		When I fill in "email" with "admin@wlion.com"
			And I fill in "password" with "pass2009"
			And I press "Login"
		Then I should be on "admin"
			And I should see "Logout"

	Scenario: Logout
		Given I am on "admin/login"
		When I fill in "email" with "admin@wlion.com"
			And I fill in "password" with "pass2009"
			And I press "Login"
			And I follow "Logout"
		Then I should be on "admin/login"
			And I should not see "Logout"

	Scenario: Login fails with bad credentials
		Given I am on "admin/login"
		When I fill in "email" with "admin@wlion.com"
			And I fill in "password" with "foobar"
			And I press "Login"
		Then I should see "Login failed"

	# TODO: how to test recover password process?
