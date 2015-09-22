# xkcd Style Password Generator

## Live URL
<http://p2.philipjames.me>

## Demo Screencast


## Description
Generates an xkcd style password based on the comic at <http://xkcd.com/936/>

## Details for teaching team
No login required.
More details to come

## Wordlist Info
I found a Google generated list of the 10,000 most common USA English words (see below). Since I knew that I only wanted words between 4 and 12 letters long in my password generator, and since the wordlist has extraneous whitespace characters in it. I wrote a short PHP script (wordlistmaker.php) that goes through the original word list, drops any words shorter than 4 characters and longer than 12, cleans the white space from them, and then serializes the new array so easy loading by the generator.php file for the password maker

## Outside code
* Bootstrap: <http://getbootstrap.com/>
* Initial word list: <https://github.com/first20hours/google-10000-english/blob/master/google-10000-english-usa.txt>