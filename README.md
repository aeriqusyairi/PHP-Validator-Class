PHP Validator Class
===================

This validation class is somewhat inspired by Laravel validation class.

List of available validation rules
 1. required
 2. min -> string only
 3. max -> string only
 4. matches
 5. unique (require DB)
 6. accepted -> must be either 'yes', 'on', or 1
 7. before -> the input date must be before the date specify in rule
 8. after -> the input date must be after the date specify in rule
 9. alpha -> alphabet only
 10. alpha_num -> alphanumeric only
 11. alpha_dash => alphanumeric, dash, and underscore only
 12. date -> validate date based on strtotime
 13. date_format -> validate the date format
 14. digits -> must be numeric and have the exact length as specified
 15. email -> validate email format
 16. ip ->validate IP format
 17. url -> validate URL format
