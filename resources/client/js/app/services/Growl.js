angular.module('app').factory('growl', ['$rootScope', function($rootScope) {
	var _messages = [];
	var _broadcast = function() {
		$rootScope.$broadcast('growl', _messages);
	};

	return {
		messages: function() {
			return _messages;
		},
		add: function(title, message, type, expireDelay) {
			var self   = this;
			var expire = expireDelay || 5000;
			switch (type) {
				case 'primary':
					self.primary(title, message, expire);
					break;
				case 'success':
					self.success(title, message, expire);
					break;
				case 'error':
					self.error(title, message, expire);
					break;
				case 'warning':
					self.warning(title, message, expire);
					break;
				case 'info':
					self.info(title, message, expire);
					break;
				default:
					self.default(title, message, expire);
					break;
			}
		},
		default: function(title, message, expire) {
			var self = this;
			var key  = Math.random().toString(36).substring(7);
			_messages.unshift({
				key: key,
				title: title,
				message: message,
				type: ''
			});
			_broadcast();
			self.expire(key, expire);
		},
		primary: function(title, message, expire) {
			var self = this;
			var key  = Math.random().toString(36).substring(7);
			_messages.unshift({
				key: key,
				title: title,
				message: message,
				type: 'primary'
			});
			_broadcast();
			self.expire(key, expire);
		},
		success: function(title, message, expire) {
			var self = this;
			var key  = Math.random().toString(36).substring(7);
			_messages.unshift({
				key: key,
				title: title,
				message: message,
				type: 'success'
			});
			_broadcast();
			self.expire(key, expire);
		},
		error: function(title, message, expire) {
			var self = this;
			var key  = Math.random().toString(36).substring(7);
			_messages.unshift({
				key: key,
				title: title,
				message: message,
				type: 'error'
			});
			_broadcast();
			self.expire(key, expire);
		},
		warning: function(title, message, expire) {
			var self = this;
			var key  = Math.random().toString(36).substring(7);
			_messages.unshift({
				key: key,
				title: title,
				message: message,
				type: 'warning'
			});
			_broadcast();
			self.expire(key, expire);
		},
		info: function(title, message, expire) {
			var self = this;
			var key  = Math.random().toString(36).substring(7);
			_messages.unshift({
				key: key,
				title: title,
				message: message,
				type: 'info'
			});
			_broadcast();
			self.expire(key, expire);
		},
		dismiss: function(index) {
			_messages.splice(index, 1);
			_broadcast();
		},
		expire: function(key, expire) {
			var self = this;
			setTimeout(function() {
				var index = _.findIndex(_messages, function(message) {
					return message.key === key;
				});
				if (index > -1) {
					self.dismiss(index);
					_broadcast();
				}
			}, expire);
		}
	};
}]);
