# photo service
Website for making a photo print orders

The service for making orders for photoprinting and souvenirs like mugs, t-shirts etc. User wants to have photos printed, he uploads his photos on ftp server. As printed photos have many kinds of formats and paper types user would like to choose one of them like 10x15cm - gloss paper - 150 quantity, for this one selects some uploaded photos with checkboxes and pick one of the formats and type of paper and click "Apply for all" button. Then underneath uploaded photos there's an order form for checkout, user enters his name, email and phone number and clicks "Checkout" button.
After user has clicked the submit button a php script generate SQL query to add record to the DB. The DB consists tables:
- user;
- order;

The user-table includes only one column with 'id' of user, id is used for identify user with session variable, for example when user visit the website php script create a recored with new incremented ID of user and that ID starts to be a session variable.
The difficult think to implement is when user uploaded new photos script makes new dir on webserver, but how identify user's photos and user himself? The answer is:
I decided to increment values in 'user' table and on the basis of this incremented value the website binds this ID with current user on website and after user uploaded photos server makes directory with name like ID of user, and after user clicked 'Checkout' button
server submits new SQL query to another table called 'order' where first column 'id' is foregn key of 'user' table which has only column as primary key.
