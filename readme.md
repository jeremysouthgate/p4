////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

# Project 4
+ By: Jeremy C. Southgate (jes4532@g.harvard.edu)
+ Production URL: <http://p4.sss1.me>


## Project Description
A robust authentication system for accessing private user content.

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

### Usage
The primary application functionality is the process of creating an account for login.

The seed example e-mails jill@harvard.edu w/ password "helloworld" and jamal@harvard.edu w/ password "helloworld" may be used to immediately test login functionality.

#### Special Features
+ A Login-attempt Limiter (7 attempts per the last 30 minutes)
+ Password Reset (acess via the "login" screen)


### CRUD Operations Summary
+ Create a User/Account.
+ Update/Activate Account with User Information, Update/Reset Password.
+ Read Information (passim) with respect to verifying account updates; Read credentials to Log In and display a basic profile.


### Database Summary
The "Users" table is primary, as a one-to-one with the "User Information" table and one-to-many with "Logins" table.


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
