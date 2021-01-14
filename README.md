# Email Compiler

This project is a quick and simple HTML email compiler written in PHP.  It allows you to build an email like a normal webpage and have your separate HTML and CSS files combined into one file.  This resulting file will have all styles as inline style attributes on every element for the greatest email compatibility.

We use [CSSCrush](https://the-echoplex.net/csscrush/) to run SASS-like optimizations and minification on your CSS before utilizing [PHPMailer](https://github.com/PHPMailer/PHPMailer) to inline it all.  Then we place the resulting code into a simple, email-optimized HTML template file ready to send.

## Setup

The project requires setting up Composer to complete installation:

 1. CD to the Composer directory with `cd ./composer`
 2. Download Composer with [https://getcomposer.org/download/](https://getcomposer.org/download/)
 3. Install Composer vendor files with `php composer.phar install`

 ## Creating/Editing Emails

 Simply make a copy of the `/emails/sample-email` directory and place it in `/emails`.  From there you may edit the `markup.php` and `style.css` documents to fit your needs.
