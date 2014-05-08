Tests
=============

###User Creation

* Single user creation test: 
  * All fields left blank -- Sign Up button pressed. UI Warning Message thrown(first name). 
  * First Name Field only -- Sign Up button pressed. UI Warning Message thrown(last name). 
  * First/Last/Username -- Sign Up button pressed. UI Warning message thrown(email). 
  * First/Last/Username/Valid Email -- Sign Up button pressed. UI Warning message thrown(password). 
  * First/Last/Username/Valid Email/Password -- Sign Up button pressed. UI Warning message (confirm password)
  * First/Last/Username/Valid Email/Password/ConfirmPassword(wrong) -- Sign Up button pressed. UI Warning message (confirm password) 
  * First/Last/Username/Valid Email/Password/ConfirmPassword -- Sign Up button pressed. Success. 
  * Confirmed user exists in users table. 
  
* Testing Users
  * Matt, Bubernak, MattBubernak, bubernak@gmail.com, password, password
  * Matt, Gross, MattGross, gross@gmail.com, password, password
  * Derek, Baum, DerekBaum, baum@gmail.com, password, password
  * Cameron, Peden, CameronPeden, CameronPeden@gmail.com, password, password
  * John, Doe, jdoe32, jdoe32@gmail.com, password, password

###User Login
* All fields blank -- Log in button presseed. UI Warning Message thrown(incorrect username/password)
* Valid Username/Wrong Password -- Log in button pressed. UI warning message thrown(incorrect username/password)
* Valid Username/Valid Password -- Log in button pressed. Succesful login. 


###Group Creation
* Group Creation Test: 
  * Group Name input filled out -- Create button pressed. UI Warning message thrown(enrollment key) 
  * Group Name input/group key -- Create button pressed. UI warning message thrown(enrollment keys dont' match)
  * Group Name/ValidKey/ValidCheckKey -- Create button pressed. Succesful group creation. 
  * Confirmed group exists in groups table. 
  * Confirmed new entry in user_groups table with correct group_id, user_id, and admin bit set to 1 of this user. 

* Testing Groups
  * GroupBubernak, MattBubernak
  * GroupGross, MattGross
  * GroupGross2, MattGross
  
###Group Joining
* Group Join Test: 
  * Confirmed Group Name dropdown contains every group name in DB
  * Group Selected -- Join button pressed, UI warning message thrown(incorrect enrollment key) 
  * Group Selected/Valid password -- Join butotn pressed, success. 
  * Confirmed user groups now contains entry for current user in group and admin bit = 0 

*Testing Joins 
  * jdoe32 joins GroupBubernak,GroupGross, GroupGross2
  * CameronPeden joins GroupBubernak, GroupGross, GroupGross2
  * DerekBaum joins GroupBubernak, GroupGross, GroupGross2
  * 

###Group Admin Posts 
* News Post Creation Test: 
  * Title and Body left blank - Post news Presed, UI warning message thrown(post must have title and body) 
  * Title/Body left blank - Post news Presed, UI warning message thrown(post must have title and body) 
  * Title Left Blank/Body - Post news Presed, UI warning message thrown(post must have title and body) 
* News Post Creation Test Posts: 
  * 6 Items, News 1-6, Body 1-6
  * Confirmed News Page displays News Items 2-6
  * Confirmed Pagination creates page 2 
  * Confirmed Page 2 contains News 1.  
 
* Video Post Creation Test: 
  * Title and Link left blank - Post video Presed, UI warning message thrown(post must have title and link) 
  * Title/Link blank - Post video Presed, UI warning message thrown(post must have title and link) 
  * Title blank/Link  - Post video Presed, UI warning message thrown(post must have title and link) 
* Video Post Creation Test Posts: 
  * 6 Items, Videos 1-6, Various links 
  * Confirmed Video Page displays Video Items 2-6
  * Confirmed Pagination creates page 2 
  * Confirmed Page 2 contains Video 1. 
  * 
  
* Workout Post Creation Test: 
  * Title and Link left blank - Post workout  Presed, UI warning message thrown(post must have title and body) 
  * Title/body blank - Post workout Presed, UI warning message thrown(post must have title and body) 
  * Title blank/body  - Post workout Presed, UI warning message thrown(post must have title and body) 
* Workout Post Creation Test Posts: 
  * 6 Items, Workout 1-6, Body 1-6 ,Various files  
  * Confirmed Workout Page displays Workout Items 2-6
  * Confirmed Pagination creates page 2 
  * Confirmed Page 2 contains Workout 1. 
  * 
  
* Plays Post Creation Test: 
  * Title and Link left blank - Post play  Presed, UI warning message thrown(post must have title and body) 
  * Title/body blank - Post play Presed, UI warning message thrown(post must have title and body) 
  * Title blank/body  - Post play Presed, UI warning message thrown(post must have title and body) 
* Plays Post Creation Test Posts: 
  * 6 Items, Play 1-6, Body 1-6 ,Various files  
  * Confirmed Play Page displays Plays Items 2-6
  * Confirmed Pagination creates page 2 
  * Confirmed Page 2 contains play 1. 
  
###Admin Functionality testing 

* Deleting player from group 
  * johndoe creates workout for 4/27 and 4/28 
  * confirmed posts contains both workouts
  * confirmed that new post_groups created for each group johndoe is in. 
  * MattBubernak removes johndoe from group 
  * confirmed john doe posts no longer show up within log 
  * confirmed that posts_groups no longer contains records for johns posts in this group. 


###Log Post Functionality Testing

*Creating log post 
 * Description left blank -- Add workout pressed, UI warning message thrown(needs at least 20 characters) 
 * Description filled out, group deselected -- Add workout button pressed, UI warning thrown(must add to at least one group) 
 * Description and valid group -- add workout pressed, workout added. 
 * confirmed posts and posts_groups have correct DB entries. 
 * Attempt at creating second workout for same day -- UI warning thrown (a workout already exists for this day) 