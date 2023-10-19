

## Smart Apps Project Setup

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. 

#### Setup and installation

- Clone the project at `git clone git@github.com:nanichang/smartapps.git`
- cd into `cd smartapp`
- Installing depnedacies: `composer install`
- Run `cp .env.example .env`
- Generate the app key: `php artisan key:generate`
- Update the `.env` file with your database and email credentials

#### Side Note

This project utilizes the repository partern. To create a module using the repository parttern, I have created a bash file called `ioc.sh` that automates the process.
###### Creating a module
- Make the file executable: `chomd +x ioc.sh`
- Run `./ioc.sh` and press ENTER
- Type the module name e.g. `Product`. This will create and also perform the following: 
```
- A Product Repository (A Contract file, a Repository file)
- A Provider file and also register it in the providers section of config/app.php
- A Product Model
- A Product Controller
- A migration file
- view directory with crud files
```

