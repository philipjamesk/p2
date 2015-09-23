# xkcd Style Password Generator

## Live URL
<http://p2.philipjames.me>

## Demo Screencast
<https://youtu.be/5QR9HxJBxcw>

## Description
Generates an xkcd style password based on the comic at <http://xkcd.com/936/>

## Details for teaching team
No login required. Please note, I took the word list from a Google source. I did not clean it up for content. So the user may get an occassional curse word included in their password.

As mentioned in the demo. I decide to replace any invalid values with defaults rather than give the user an error message. I thought this makes more sense people would probably get a password of some form rather than have to fill out the form again.

## Wordlist Info
I found a Google generated list of the 10,000 most common USA English words (see below). Since I knew that I only wanted words between 4 and 12 letters long in my password generator, and since the wordlist has extraneous whitespace characters in it. I wrote a short PHP script (wordlistmaker.php) that goes through the original word list, drops any words shorter than 4 characters and longer than 12, cleans the white space from them, and then serializes the new array so easy loading by the generator.php file for the password maker. The serialized file has 8752 words in it. I put in echo statements so I would see some confirmation in the browser when I ran the script. The file can be run by going to <http://p2.philipjames.me/wordlistmaker.php>

## Outside code
* Bootstrap: <http://getbootstrap.com/>
* Initial word list: <https://github.com/first20hours/google-10000-english/blob/master/google-10000-english-usa.txt>