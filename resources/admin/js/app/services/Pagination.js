angular.module('app').factory('Pagination', Pagination);

function Pagination() {
	return {
		make: function(pagination, totalResults, resultsPerPage) {
			pagination.visible = [];
			pagination.total   = Math.ceil(totalResults / resultsPerPage);
			var i;
			if (pagination.limit >= pagination.total) {
				for (i = 0; i < pagination.total; i++) {
					pagination.visible[i] = i + 1;
				}
			} else {
				pagination.visible = [];
				var range  = pagination.limit - Math.ceil(pagination.limit / 2);
				var offset = 0;
				for (i = -1 * range; i < range + 1; i++) {
					// Determine offset for pages that are near the beginning or end of the pagination
					if (pagination.current + i + offset < 1 && offset === 0) {
						offset = Math.abs(pagination.current - range) + 1;
					} else if (pagination.current + range > pagination.total && offset === 0) {
						offset = pagination.total - (pagination.current + range);
					}

					// Append page to visible pages list
					pagination.visible[pagination.visible.length] = pagination.current + i + offset;
				}
			}
			return pagination;
		}
	};
}
