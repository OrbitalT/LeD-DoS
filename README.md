# DoS

[![Build Status](https://travis-ci.org/PROFESSOREGGMAN/LeD-DoS.svg?branch=master)](https://travis-ci.org/PROFESSOREGGMAN/LeD-DoS)

DoS is a new way to preform a DDoS on a target without complcated code

  - Simple
  - Html, PHP, JS and Node
  - Open sorce

# New Features! - (5/18/19)

  - Updates to Control Panel
  - Fixed issues with loading ip into node

### Installation and Use

DoS requires [Node.js](https://nodejs.org/) v11.10+ to run.

Install the dependencies and devDependencies and start the server.

```sh
$ git clone https://github.com/PROFESSOREGGMAN/LeD-DoS.git DoS
$ cd DoS
$ nano dos.js
```

Inside the dos.js you will find request('http://loaclhost/......') replace the http://localhost with a website that is able to run the dos.php, ip.txt and active.txt files. You can also use localhost but it will need to be port forward to be avalible with outside computers. ex: http://localhost/DoS/dos.php:8080

### Todos

 - Ping attack
 - install to PC without detection

License
----

MIT
