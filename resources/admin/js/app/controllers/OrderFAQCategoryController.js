angular.module('app').controller('OrderFAQCategoryController', OrderFAQCategoryController);

function OrderFAQCategoryController($scope, $http, growl) {
    // Config
    $scope.saveError   = false;
    $scope.saveSuccess = false;

    $http.get('/api/faqcategories/categories-for-sorting')
        .success(function(data) {
            // Setup Pages
            $scope.faqs = data;
            console.log(data);

            // Format page data for nested sortable directive
            $scope.rootItem = {
                id: 0,
                name: 'Root Item Placeholder',
                root: true,
                children: $scope.faqs
            };
        });

    // Config sortable options
    $scope.sortableOptions = {
        connectWith: '.s-droppable',
        handle: '.s-sortable',
        placeholder: 's-droparea',
        // This is used to fix a y-position bug during drag when page isn't scrolled to top
        sort: function(event, ui) {
            var $target = $(event.target);
            if (!/html|body/i.test($target.offsetParent()[0].tagName)) {
                var top = event.pageY - $target.offsetParent().offset().top - (ui.helper.outerHeight(true) / 2);
                ui.helper.css({top: top + 'px'});
            }
        }
    };

    // Save new page order
    $scope.savePageOrder = function(data) {
        $http.post('/api/faqcategories/save-order', data)
            .success(function(response) {
                // Success message
                var title   = 'Notice';
                var message = 'FAQ\'s display order has been saved successfully';
                var type    = 'success';
                growl.add(title, message, type, 7000);
            })
            .error(function(response) {
                var title   = 'Oops';
                var message = 'FAQ\'s display order failed to save. Please try again.';
                var type    = 'error';
                growl.add(title, message, type, 5000);
            });
    }
}
