angular.module('app').directive('validation', validation);

function validation() {
	return {
		restrict: 'A',
		require: 'ngModel',
		link: function(scope, elem, attrs, ngModel) {
			var validators = attrs.validation.split('|');
			var isRequired = false;
			var rule, pattern;

			var validate = function(rule, pattern) {
				ngModel.$validators[rule] = function(value) {
					var status;
					var isEmpty = ngModel.$isEmpty(value);

					if (!isRequired && isEmpty) {
						status = true;
					} else if (isRequired && isEmpty) {
						if (rule === 'required') {
							status = false;
						} else {
							status = true;
						}
					} else {
						pattern = new RegExp(pattern);
						status  = pattern.test(value);
					}

					return status;
				};
			};

			if (validators) {
				for (var i = 0; i < validators.length; i++) {
					var params = validators[i].split(':');
					if (params.indexOf('required') > -1) {
						isRequired = true;
					}

					switch (params[0]) {
						case 'alpha':
							rule = 'alpha';
							pattern = '^[a-zA-Z]*$';
							validate(rule, pattern);
							break;
						case 'alphaDash':
							rule = 'alphaDash';
							pattern = '^[a-zA-Z-_]+$';
							validate(rule, pattern);
							break;
						case 'alphaNum':
							rule = 'alphaNum';
							pattern = '^[a-zA-Z0-9]+$';
							validate(rule, pattern);
							break;
						case 'alphaNumDash':
							rule = 'alphaNumDash';
							pattern = '^[a-zA-Z0-9-_]+$';
							validate(rule, pattern);
							break;
						case 'email':
							rule = 'email';
							pattern = '^(([^<>()[\\]\\\\.,;:\\s@\\"]+(\\.[^<>()[\\]\\\\.,;:\\s@\\"]+)*)|(\\".+\\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$';
							validate(rule, pattern);
							break;
						case 'phone':
							rule = 'phone';
							pattern = '^\\(\\d{3}\\)[\\s]\\d{3}[-]\\d{4}$';
							validate(rule, pattern);
							break;
						case 'integer':
							rule = 'integer';
							pattern = '^-?[\\d]+$';
							validate(rule, pattern);
							break;
						case 'ipAddress':
							rule = 'ipAddress';
							pattern = '^(?:(?:2[0-4]\\d|25[0-5]|1\\d{2}|[1-9]?\\d)\\.){3}(?:2[0-4]\\d|25[0-5]|1\\d{2}|[1-9]?\\d)(?:\\:(?:\\d|[1-9]\\d{1,3}|[1-5]\\d{4}|6[0-4]\\d{3}|65[0-4]\\d{2}|655[0-2]\\d|6553[0-5]))?$';
							validate(rule, pattern);
							break;
						case 'noWhitespace':
							rule = 'noWhitespace';
							pattern = '^[\\S]+$';
							validate(rule, pattern);
							break;
						case 'number':
							rule = 'number';
							pattern = '^-?(?:\\d+|\\d{1,3}(?:,\\d{3})+)?(?:\\.\\d+)?$';
							validate(rule, pattern);
							break;
						case 'url':
							rule = 'url';
							pattern = '^(http(?:s)?\\:\\/\\/[a-zA-Z0-9\\-]+(?:\\.[a-zA-Z0-9\\-]+)*\\.[a-zA-Z]{2,6}(?:\\/?|(?:\\/[\\w\\-]+)*)(?:\\/?|\\/\\w+\\.[a-zA-Z]{2,4}(?:\\?[\\w]+\\=[\\w\\-]+)?)?(?:\\&[\\w]+\\=[\\w\\-]+)*)$';
							validate(rule, pattern);
							break;
						case 'min':
							rule = 'min';
							pattern = '^.{' + params[1] + ',}$';
							validate(rule, pattern);
							break;
						case 'max':
							rule = 'max';
							pattern = '^.{0,' + params[1] + '}$';
							validate(rule, pattern);
							break;
						case 'password':
							rule = 'password';
							pattern = '^(?=.*\\d)(?=.*[a-z])(?=.*\\W).{8,}$';
							validate(rule, pattern);
							break;
						case 'match':
							scope.$watch(function() {
								var viewValue = formCtrl[params[1]].$viewValue;
								rule = 'match';
								pattern = '^' + viewValue + '$';
								validate(rule, pattern);
							});
							break;
						case 'required':
							rule = 'required';
							pattern = '\\S';
							validate(rule, pattern);
							break;
					}
				}
			}
		}
	};
}
