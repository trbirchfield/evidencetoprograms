angular.module('app').directive('nestedSortable', nestedSortable);

function nestedSortable() {
    return {
        restrict: 'E',
        scope: {
            item: '=',
            sortableOptions: '='
        },
        template: '<div ng-include="templateUrl"></div>',
        link: function(scope, elem, attrs) {
            var defaultOpen = true;
            if (!_.isUndefined(attrs.sortableOpen)) {
                defaultOpen = (attrs.sortableOpen === 'false') ? false : true;
            }
            scope.item.open   = scope.item.open || defaultOpen;
            scope.templateUrl = 'templates/Sortable.html';
        }
    };
}
