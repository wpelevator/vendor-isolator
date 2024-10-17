# Vendor Isolator

Composer plugin to isolate project dependencies by prefixing their namespace.

## To Do

- Describe how this is different from php-scoper and other projects.

## Features and Limitations

- It only rewrites the non-development dependencies in the `vendor` directory, therefore your application code must reference the isolated dependencies by their prefixed namespace.

- It doesn't replace function definitions and calls in the global namespace. Any definitions and calls to global functions will remain in the global namespace after the transformation.

## Credits

A fork of [and/composer-isolation](https://github.com/logical-and/composer-isolation).
