## Scripts and info on them;

note: both scripts need to be added in unity as 'Assets'

### `character_data.cs`

This is the class that creates an object that contains character info.  
Every character object created by it has the following variables;

|name|type|desc|
|---|---|---|
|`id`|string|A character's unique id, used to grab data from the SQL server|
|`info`|string array|contains data from the 'char_info' table (excluding id column)|
|`stats`|string array|contains data from the 'char_stats' table (excluding id column)|
|`all_condition_values`|string array|contains data from the 'conditions' table (excluding id column)|
|`conditions`|string list|contains the conditions a character is currently effected by|
|`condition_order`|string array|'conditions' column order. compared to `all_condition_values` to produce `conditions`|
|`client`|HttpClient class|used to make POST request to PHP script|

Methods/Functions in this script include;

|name|parameter(s) and type|desc|
|---|---|---|
|`get_data`|id (string)|begins by doing a POST request to get data from the PHP script. Then sends the response to `status`|
|`status`|all_data  (string)|assigns the data from `get_data` into variable `all_data` . `all_data` is split up into arrays: `info`, `stats`, `all_condition_values`. Function `get_conditions` is then called at the end|
|`get_conditions`|-|iterates though `all_condition_values` and finds all non-null values. when it finds one, it finds the 'column' it correlates to in the table (using `condition_order`) and appends that to `conditions`|


### `object_test.cs`

This script is a test to make sure instancing `character_data.cs`. 

#### To run it:

0.  Create an object
![step 0](https://imgur.com/HsERI9j.png)  
1.  Select the object and in the inspector menu click 'Add Component'  and select `character_data (Script)`. There should then be an editable box called 'Id'. In this, enter the id of the character you want from the database.
![step 1](https://imgur.com/Ch1WdqN.png)  
2.  On another object (can create another one, just dont use the same object used in step 1), add the `object_test (Script)`. Instead of adding an id, change the text in 'Data' to the name of the object running `character_data (Script)`.
![step 2](https://imgur.com/12ysf3D.png)  
3.  Press play, and the game should create a 'clone' of the object using the `character_data (Script)`. This clone should have all of the data from the database, as shown in the inspector menu.
![step 3](https://imgur.com/3tit7Gw.png)  

This cloned object is the instance of the `character_data` class created in the `object_test (Script)`. The object `character_data (Script)` is running on is used as a 'base' by `object_test (Script)` to clone from. Both scripts cannot be running on the same obejct, otherwise infinate clones will be created.

