////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

# Project 4
+ By: Jeremy C. Southgate (jes4532@g.harvard.edu)
+ Production URL: <http://p4.sss1.me>


## Project Description
A robust authentication system for accessing private user content.

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

### Usage
The seed example e-mail "jes4532@g.harvard.edu" and test password "Password123!" may be used to immediately test login functionality. However, the primary application functionality is the process of creating an account for login.


### CRUD Operations Summary
+ Create a User/Account.
+ Update/Activate Account with User Information, Update/Reset Password.
+ Read Information (passim) with respect to verifying account updates; Read credentials to Log In.


### Database Summary
The "Users" table is primary, as a one-to-one with the "User Information" table and one-to-many with "Logins" table.


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
