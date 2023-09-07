# TMDB!
## Context
Create laravel backend and simple frontend page to list, CRUD movies, the backend is fetching and store movies data from an external API TMDB to a local database.

### stack used
* Laravel
* Inertia +Vue
* jetstream
* https://tailwindui.com/

## Steps 

Follow those steps to launch and test the App :

## 1. clone the project 

Use this command to clone the project
```   
 git clone https://github.com/hnkoy/test_kadea.git
 ```

## 2. Install packages

After clonning the code make sure you are in the project directory and run those commands:
Install composer dependancies
```   
 composer install
 ```
Install npm dependancies
```   
 npm install
 ```

## 3. Database initialisation
> **Note:** The first step make sure you create and setup your db config in the .env file 
```   
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD
 ```

run this command to generate the app key

```   
php artisan key:generate
 ```

 and  **run migration** using this artisan command
```   
 php artisan migrate
 ```

## 4. Data Initialisation

** Optional** You can test   the app by running the seeder with fake data to see how everything is working. run this command below
```   
 php artisan db:seed
 ```
**Load Real Data from TMDB api**  Fetch and store real movies data from the TMDB Api.
First you will need to have a TMDB account [clic  here](https://www.themoviedb.org/) to register or login,  follow those steps to get your personnal API key [clic  here](https://kb.synology.com/en-au/DSM/tutorial/How_to_apply_for_a_personal_API_key_to_get_video_info)

Once you have acces on  your TMDB api Key you can use it, setup those env variable in the .env file

```   
TMDB_API_KEY=YOUR_TMDB_API_KEY
TMDB_BASE_URL=https://api.themoviedb.org/3/trending/all/day?language=en-US
TMDB_IMG_BASE_URL=https://image.tmdb.org/t/p/w400
 ```

Now you have everything ready to fetch and store Movies Data from TMDB Api.
run this command to fetch and store movies data from TMDB
```   
php artisan tmdb:load-remote-data 10 
 ```
**Note:** The **10** in the command is the total numbers of pages(pagination) you need to fetch and store.

**Note:** If you need to start the  scheduler job  to fetch and update local data daily use this command below
```   
php artisan schedule:work 
 ```

# 5. Launch the web application

 Launch the app by running:
```   
npm run dev 
 ```
and

```   
php artisan serve 
 ```

