  

  Base de datos= store
  Table = articles
   
   structure table; 
   id  primary key   AUTO_INCREMENT
   title  varchar(255)   utf8mb4_unicode_ci	
   details  varchar(255)   utf8mb4_unicode_ci
   total  varchar(255)   utf8mb4_unicode_ci
   cost  varchar(255)   utf8mb4_unicode_ci
   created_at  timestamp
   updated_at	timestamp

# React and Laravel CRUD

Description of project; 

Back-End Php 8.2.4; 
- Creation Api.
- Functions create, read, update, delete of products.


Front-End React.js 18; 
- Functions cread, read, update and delete produtcs.
- Consume and response Api Rest.
- See total of stock.
- Pagination.



## Badges

Add badges from somewhere like: [shields.io](https://shields.io/)

[![MIT License](https://img.shields.io/badge/License-MIT-blue.svg)](https://choosealicense.com/licenses/mit/)
href="https://github.com/jvrDvos/jvrDvos">

## Run Locally

Clone the project

```bash
  git clone https://github.com/jvrDvos/Phyton3.10React.js18CRUDSearchStock
```

Go to the project directory

Navagate to the backend and frontend folder, install dependencies and start the server

For the backend
```bash
  cd api 
  php
  php artisan serve 
```
if you want to have some sample data run
```bash
    php artisan migrate
    php artisan db:seed 
```
or
```bash
    php artisan migrate --seed
```
For the frontend
```bash
  cd front
  npm install
  npm run dev
```




## Deployment

To deploy this project run

```bash
  npm start
```


## Author

- [@jvrDvos](https://github.com/jvrDvos)
	