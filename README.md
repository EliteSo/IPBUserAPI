IPBUserAPI
==========
IPB User API is an api that was designed for use in The Elite Patch in conjunction with an IPB based forum. Currently it allows a user to authenticate using an ipb forum login. This will be updated often and future updates include the ability to get an avatar, and specific details about a user. This API may be useful when one wants to interface their forums with a program written in a different language.. 

Changelog
==========
V1 Alpha
Currently Stable. Allows user to login to an IPB based forum.

Usage
==========
http://yourdomain.com/api.php?name=(your username)&password=(your password)

Requirements
==========
IPB (tested against v3)

Issues
==========
Hash tags (#) do not parse well with php & $_GET. To fix this, i replace all '#' with 'gigahash' when sending to the url. The api then replaces the phrase 'gigahash' with the '#' symbol, then md5's the pass and compares.

What does it return?
==========
Good pass:
'success'

Bad pass:
'bad password or username'
