# Scott & White Evidence To Programs

## Getting started

Clone the repo down to your local machine:

```cd ~/Code```
```git clone git@github.com:wlion/scottwhite.git evidencetoprograms-com```
```cd evidencetoprograms-com```
```vagrant up```
```Add "192.168.20.10 evidencetoprograms.dev" to /etc/hosts file```

Now you should be good to go!

## Front End Workflow

Most of your work will be done in the ```/resources/client``` directory.

### Building Assets

To compile all your assets (CSS and JavaScript), you will need to use the following tasks:

Command             | Description
------------------- | ---------------------------------------------------------------------------------------------------
```gulp```          | Runs all build tasks once, including "js", "modules", "css", "vendor" and "fonts"
```gulp js```       | Compiles and moves all non-"app" JavaScript files from the /resources/client/js and /resources/admin/js directories into their counterparts in the /public/js and /public/build/js folders
```gulp modules```  | Compiles and moves all files in the app JavaScript files from the /resources/client/js/app and /resources/admin/js/app directories into a sinlge app.js file in the /public/js/admin, /public/js/client, /public/build/js/admin and /public/build/js/client folders.
```gulp css```      | Compiles SASS files in the /resources/client/scss and /resources/admin/scss directories into their counterparts in the /public/css and /public/build/css folders
```gulp vendor```   | Moves pre-configured vendor files from the /bower_components directory to the /public/vendor and /public/build/vendor folders
```gulp fonts```    | Moves font files from the /resources/client/fonts directory and pre-configured vendor fonts from the /bower_components directory to the /public/fonts folder
```gulp cleaup```   | Runs all build tasks and cleans up the build directory so that it only has one version of each file
```gulp watch```    | Watches for changes via the ```gulp css```, ```gulp js``` and ```gulp modules``` tasks.

> Note: Before committing any work, always run ```gulp cleaup```.
