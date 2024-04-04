# Car Parking System Backend

This Laravel backend project serves as the backend for a car parking management system. It provides various endpoints to interact with the system's functionalities.

## Endpoints

### Profile
- `GET /profile` : Retrieves user profile information
- `PUT /profile` : Updates user profile information
- `PUT /password` : Updates user password

### Vehicles
- `GET /vehicles` : Retrieves a list of vehicles
- `POST /vehicles` : Creates a new vehicle
- `GET /vehicles/{vehicle}` : Retrieves a specific vehicle
- `PUT /vehicles/{vehicle}` : Updates a specific vehicle
- `DELETE /vehicles/{vehicle}` : Deletes a specific vehicle

### Parkings
- `GET /parkings` : Retrieves active parkings
- `GET /parkings/history` : Retrieves parking history
- `POST /parkings/start` : Starts a parking session
- `GET /parkings/{parking}` : Retrieves information about a specific parking
- `PUT /parkings/{parking}` : Stops a parking session

### Zones
- `GET /zones` : Retrieves information about parking zones

## Middleware

The project uses Sanctum for authentication. Breeze package is utilized for user authentication.

### Custom Routes
Custom binding is added to fetch an `activeParking` instance using `Parking` model.

Route::bind('activeParking', function ($id) {
    return Parking::where('id', $id)->active()->firstOrFail();
});



## Setup
1. Clone the repository
2. Install dependencies using `composer install`
3. Create a copy of `.env.example` as `.env` and update database configurations
4. Run migrations with `php artisan migrate`
5. Seed database with initial data if needed
6. Start the server with `php artisan serve`

For more detailed documentation, refer to the Laravel documentation at [laravel.com/docs](https://laravel.com/docs).

Feel free to contribute or report any issues by creating a pull request or submitting an issue.
