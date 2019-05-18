const request = require('request');
const cheerio = require('cheerio');
var ping = require('ping');

setInterval(function () {

    request('http://localhost/LeD-DoS/Web/dos.php', (error, response, html) => {
        if (!error && response.statusCode == 200) {
            const $ = cheerio.load(html);

            const ip = $('.ip');
            const output = ip.find('p').text();

            var hosts = [output];
            hosts.forEach(function (host) {
                ping.sys.probe(host, function (isAlive) {
                    var msg = isAlive ? 'host ' + host + ' is alive' : 'host ' + host + ' is dead';
                    console.log(msg);
                });
            });
        }
    });
}, 1000);