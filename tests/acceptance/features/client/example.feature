Feature: Example Feature
	In order to show how to write features
	As a developer
	I want to show a few examples

	Scenario: Home page is loading
		Given I am on the homepage
		Then I should see "Project Template"
			And I can do something with Laravel

	Scenario: 404 error handling
		When I go to "foo"
		Then I should see "Page Not Found."

	Scenario: Successfully submit a form
		Given I am on "test/form"
		When I fill in "name" with "User One"
			And I fill in "email" with "user1@wlion.com"
			And I fill in "message" with "test"
			And I press "Submit"
		Then the response status code should be 200
