angular.module('app').factory('growl', growl);

function growl($rootScope) {
	var _messages = [];
	var _broadcast = function() {
		$rootScope.$broadcast('growl', _messages);
	};

	return {
		messages: function() {
			return _messages;
		},
		add: function(title, message, type) {
			var self = this;
			switch (type) {
				case 'primary':
					self.primary(title, message);
					break;
				case 'success':
					self.success(title, message);
					break;
				case 'error':
					self.error(title, message);
					break;
				case 'warning':
					self.warning(title, message);
					break;
				case 'info':
					self.info(title, message);
					break;
				default:
					self.default(title, message);
					break;
			}
		},
		default: function(title, message) {
			_messages.push({
				title: title,
				message: message,
				type: ''
			});
			_broadcast();
		},
		primary: function(title, message) {
			_messages.push({
				title: title,
				message: message,
				type: 'primary'
			});
			_broadcast();
		},
		success: function(title, message) {
			_messages.push({
				title: title,
				message: message,
				type: 'success'
			});
			_broadcast();
		},
		error: function(title, message) {
			_messages.push({
				title: title,
				message: message,
				type: 'error'
			});
			_broadcast();
		},
		warning: function(title, message) {
			_messages.push({
				title: title,
				message: message,
				type: 'warning'
			});
			_broadcast();
		},
		info: function(title, message) {
			_messages.push({
				title: title,
				message: message,
				type: 'info'
			});
			_broadcast();
		},
		dismiss: function(index) {
			_messages.splice(index, 1);
			_broadcast();
		}
	};
}
