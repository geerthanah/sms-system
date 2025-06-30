SMS System
==========

A SMS management system built with CodeIgniter MVC framework.

Features
--------
- Send and receive SMS messages
- Manage contacts and groups
- View message history and status
- Manage contacts and groups

Installation
------------
1. Clone the repository:

   .. code-block:: bash

      git clone https://github.com/yourusername/sms-system.git

2. Navigate into the project directory:

   .. code-block:: bash

      cd sms-system

3. Setup the database:

   - Create a new MySQL database.
   - Import the SQL schema located in `/database/schema.sql`.

4. Configure the application:

   - Copy `application/config/config.php` and `application/config/database.php` as needed.
   - Set your database credentials in `application/config/database.php`.
   - Configure base URL and other settings in `application/config/config.php`.

5. Set folder permissions:

   Ensure the following folders are writable by the webserver:

   - `application/cache/`
   - `application/logs/`
   - `uploads/` 

Usage
-----
- Open your browser and navigate to your project URL.
- Register or login to start sending SMS.
- Manage your contacts and view message logs.

Dependencies
------------
- PHP >= 7.4
- MySQL
- CodeIgniter 3.x
- A configured SMS gateway (configure SMS gateway API credentials in config)


License
-------
MIT License


