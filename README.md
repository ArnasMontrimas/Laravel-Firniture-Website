<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About
---
#### Website for Furniture Manufacturer
This website allows a Furniture Manufacturer to assign a Supervisor who will create timesheets for employees who are working on products the products are furniture. The Supervisor specifies how many hours each week did a particular employee work on a particular product and specifies if the product was completed that given week for which the timesheet is being entered.
When a timesheet is made an automatic job order number is assigned which links to the timesheet, employee and product.

There are also Admin users who may enter timesheets aswell, but they can add new products which need to be built, they can create new employees on the website who have joined the work force, delete employees who have left and update employees.

Lastly there are Production type users which may enter the website to take a look at the products which are waiting for someone to start building them.

## Functionality
---
* 3 Roles (Admin,Supervisor,Production)
* Login - Roles All
* View Products - Roles All
* Create New Employees (Register) - Role Admin
* Update Employees - Role Admin
* View Employees - Role Admin
* Delete Employees - Role Admin
* Add Products - Role Admin
* Create Timesheet - Role Admin,Supervisor
* View Timesheet - Role Admin,Supervisor
* Continue Tmesheet - Role Admin,Supervisor
* Export Weekly, Monthly, Yearly, All time, Report to excel - Roles Admin,Supervisor
* * Report includes: product id, product name, product category, employee id, estimated build time, actual build time, product selling price, cost to build, net profit.




## Website
[Furniture Manufacturere Website](https://furniturefanufacturer.herokuapp.com/)
> Website might take a minute or two to load, because of cold starts


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
