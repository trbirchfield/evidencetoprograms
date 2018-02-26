angular.module('app').directive('questions', ['growl', '$http', '$timeout', function(growl, $http, $timeout) {
	return {
		restrict: 'AE',
		replace: true,
		scope: {
			questionId: '@',
		},
		templateUrl: 'templates/questions.html',
		link: function(scope, element) {
			// Initialize tooltipster
			element.find('.tooltip').tooltipster({
				contentAsHTML: true
			});

			// Get questions
			$http.get('/public/packages/questions.json')
				.then(function(data) {
					scope.questions = data.data.questions;
					setCurrentQuestion(scope.questionId);
				});

			scope.doYes = function(event) {
				event.preventDefault();
				processResponse('yes');
			};

			scope.doNo = function(event) {
				event.preventDefault();
				processResponse('no');
			};

			function setCurrentQuestion(questionId) {
				scope.question = _.where(scope.questions, { 'id': parseInt(questionId) })[0];
				element.fadeIn(500);
			}

			function processResponse(response) {
				var action = scope.question[response].action;
				var params = scope.question[response].params;

				switch (action) {
					case 'loadQuestion':
						element.find('.text-container').slideUp(0, function() {
							scope.texts = [];
						});
						element.fadeOut(0);

						// Load in a new question
						setCurrentQuestion(params[0]);
						break;
					case 'loadText':
						// Load in the text options
						buildText(params);
						break;
				}
			}

			function buildText(options) {
				var textContainer = element.find('.text-container');
				textContainer.slideUp(300, function() {
					scope.texts = options;
					scope.$apply();
					$timeout(function() {
						textContainer.slideDown(300);
					});
				});
			}
		}
	};
}]);
