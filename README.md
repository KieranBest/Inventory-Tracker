# CakePHP Inventory Manager

This application was created using [CakePHP](https://cakephp.org) 5.1.5.
The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Purpose

The purpose of this application is to allow the user to add, update, edit and delete items from an inventory database created using MYSQL.
There are various rules against inventory such as the following:

- name: Required, unique, must be between 3 and 50 characters.
- quantity: Integer, >= 0, <= 1000.
- price: Decimal, > 0, <= 10,000.
- Products with a price > 100 must have a minimum quantity of 10.
- Products with a name containing "promo" must have a price < 50.
- Stock levels: determined by the quantity such as:
  - In stock: Quantity > 10.
  - Low stock: Quantity between 1 and 10.
  - Out of stock: Quantity = 0.
- `last_updated` field is to be updated upon modification
