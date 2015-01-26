FM-WebDirect_Params
===========
As of the FileMaker Server 13.0v2 update, the ability to pass in parameters via a URL has been removed due to unspecified security concerns. Despite this omission, it seems a reasonable expectation to be able to pass parameters to a web app in order to do something.

In the example presented here, we show how to bring this ability back to WebDirect. It involves a few PHP files to make it work, along with a startup script in your FileMaker file to check for the existence of any parameters.

The FileMaker file goes on your WebDirect enabled FileMaker Server. The PHP scripts go on your web server. Update the Resources field, "php_url" in the FileMaker file to point to the location of your PHP scripts.

Admin Security Credentials:
User: admin
Pass: admin

Demo Security Credentials:
User: demo
Pass: demo

You can use the above credentials for testing and adjust to your needs.

You can optionally edit the php file, "fm_link.php" to include the name ("fmfile") and location ("fmurl") of your WebDirect enabled FileMaker database. Otherwise, you can include these as parameters in your URL as well like the following example:

fmurl=server_ip_or_domain_name&fmfile=WebDirect_Params

The example URLs below demonstrate how to pass certain parameters that are set to work with this demo:

Example of finding on first name:
http://server_ip_or_domain_name/fm_link.php?First_Name=Helga

Example of finding on first and last name:
http://server_ip_or_domain_name/fm_link.php?First_Name=Andrew&Last_Name=Fenstermacher

Example of error trapping:
http://server_ip_or_domain_name/fm_link.php?First_Name=Mike&Last_Name=Duncan
(no records found)

Example of multiple records found:
http://server_ip_or_domain_name/fm_link.php?Last_Name=R
(2 records returned)


