Laravel Restricted is a simple Laravel package that provides a system for authenticated users to place their access into a restricted mode.

This can be useful for an application that needs a "kiosk" mode.

Laravel Restricted assumes that your Laravel application has a Bootstrap 4 type layout located at `resources/views/layouts/app.blade.php`.  This is the default layout that comes preinstalled with [laravel/ui](https://github.com/laravel/ui).

# Middleware

By default, the `Restricted` middleware is applied to the `web` middleware group.  Once an authenticated user has entered restricted mode, any route that does not have the `can:unrestricted` middleware/gate becomes protected and cannot be accessed.

# Gates

### can:restricted

This can be applied to any routes that you would like to be restricted.  If your application uses the default `web` middleware group, you will likely never need this gate.

### can:unrestricted

This can be applied to any routes that you would like to be unrestricted.  An example would be the kiosk's customer survey form.
