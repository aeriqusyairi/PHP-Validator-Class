PHP Validator Class
===================

This validation class is somewhat inspired by Laravel and PHPAcademy validation class.

Handy for managing site-wide validation rules.

List of available validation rules
==================================
 1. required 
    - required field
 2. min 
    - verify a string has a minimum length as specified
 3. max 
    - verify a string has a maximum length as specified
 4. matches 
    - verify that a value in a field is similar to value in specified field
 5. unique 
    - verify that a value is unique in a database table (need singleton database class)
 6. accepted 
    - a value must be either 'yes', 'on', or 1
 7. before 
    - input date must be before the date specify in rule
 8. after 
    - input date must be after the date specify in rule
 9. alpha 
    - verify a string contain only alphabetic character (not including unicode character)
 10. alpha_num 
     - verify a string contain only alphanumeric character (not including unicode character)
 11. alpha_dash 
     - verify a string contain only alphanumeric, dash, and underscore (not including unicode character)
 12. date 
     - validate date based on strtotime
 13. date_format 
     - validate date format
 14. digits 
     - Input must be numeric and have the exact length as specified
 15. email 
     - validate email format
 16. ip 
     - validate IP format
 17. url 
     - validate URL format

Usage
=====
!TODO


