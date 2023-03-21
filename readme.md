# CAFS3 sample project

## Installation

1. Open terminal in this directory
1. `docker-compose up -d`
1. After all containers finish setting up, your server should be available on [http://localhost](http://localhost)
1. Configure your Laravel project (`src/`)
   1. Copy `.env.dev.example` and rename to `.env` - it is preconfigured to immediately work with your MySQL database
   1. Open the Laravel project in your browser
   1. Click the button to generate Aapplication Key
   1. If you're getting file permission errors on a Linux system, provide full permissions (777) to `.env`, `storage/logs/laravel.log`, `storage/framework/` (_fastest solution, not recommended for real projects_)
