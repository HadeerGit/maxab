**Task:** 

A student required to finish a book of thirty chapters, he is allowed to choose when he starts,
 days he will be attending every week and a starting date.

You are required to develop an api using Laravel framework that takes 3 inputs:

 - Starting date
 - int array with number of days per week assuming the start of the week is Saturday.
    Example: {2,4,6}
 - How many sessions required to finish one chapter.
    Example: {6}

Response will be a json representing the sessions schedule for this student until he finishes the 30 chapters.

Example [2019-08-01, 2019-09-1, ….]

**Notes:**
  - Number of day is located within period from 1 to 7 ex: 1 ===> saturday
  - i have attached postman collection for testing
  