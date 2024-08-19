# T3G League Website

An ancient site built with php for tracking of T3 The Gauntlet's Subspace/Continuum League. Uploaded as it was built originally in 2007. Coding practices are non-existent as expected of something from almost 20 years ago.

## Status

Trying to reverse engineer the database to make it useable again, and attempting to modernize the codebase, although it'd probably be smarter to just build it from the ground-up, it's an interesting exercise to try and restore something like this. The codebase itself included database usernames and passwords to services and hosts that have lost been long to time.

## Prerequisites

* php 5.6 and above, ideally php 8 since some references have been updated.
* A local MySQL server.

## Instructions

1. Create an `.env` file in the root of the repository and add the following variables:

```
DB_HOST=<your_mysql_installation> (typically `127.0.0.1:3306`)
DB_USER=<your_user>
DB_PASS=<your_pwd>
DB_NAME=T3G
```

2. Run the script present under the `sql` folder, it includes current reversed-engineer tables and some mock data.
3. Run `php -S 127.0.0.1:8000` or choose any other port

## Future

If we get T3 up and running again, this should be able to host all the league information for future leagues. We'll see...