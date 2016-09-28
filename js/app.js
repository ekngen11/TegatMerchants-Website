var app = angular.module('myApp', ['ui.router', 'uiGmapgoogle-maps']);


app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('home');

    $stateProvider
        .state('home', {
            url: '/home',
            templateUrl: '/views/home.html'
        })
        .state('team', {
            url: '/team',
            templateUrl: '/views/team.html'
        })
        .state('about', {
            url: '/about',
            templateUrl: '/views/about.html'
        })
        .state('projects', {
            url: '/projects',
            templateUrl: '/views/projects.html'
        })
        .state('contact', {
            url: '/contact',
            templateUrl: '/views/contacts.html'
        })


});
app.config(function(uiGmapGoogleMapApiProvider) {
    uiGmapGoogleMapApiProvider.configure({
        key: 'AIzaSyAXNcT22pnAWrLyboS2uXZyRFL4mWPzEAM',
        v: '3.20', //defaults to latest 3.X anyhow
        libraries: 'weather,geometry,visualization'
    });
})

app.controller("mainCtrl", function($scope) {
    // Do stuff with your $scope.
    $scope.map = {
        center: {
            latitude: -1.258250,
            longitude: 36.784837
        },
        zoom: 16
    };

    $scope.options = {
        scrollwheel: false
    };
    $scope.marker = {
        id: 0,
        coords: {
            latitude: -1.258250,
            longitude: 36.784837
        }

    };

});
$(document).ready(function() {
    $('.slider').slider({
        full_width: true,
        height:600

    });
    $(".button-collapse").sideNav();
});
